<?php

namespace Atom\Protocol\Topic;

use Evenement\EventEmitter;

class Container extends EventEmitter {

	private $topics;

	function __construct($loop) {
		$this->loop = $loop;
	}
	
	public function attach(\Atom\Protocol\Topic\TopicInterface $topic) {
		if(!isset($this->topics[$topic->name])) {
			$this->topics[$topic->name] = $topic;
		} else {
			throw new \Exception("Topic Already Exists");
		}

		$that = $this;
		$topic->on('published', function($data, $topic) use($that) {
			// echo $topic->name . " : " . $data . PHP_EOL;
			$that->emit('published', array($data, $topic));
		});
	}

	public function exists($topic = null) {
		return isset($this->topics[$topic]);
	}

	public function toArray() {
		return $this->topics;
	}

	public function publish($time, $topic, $data) {

		$that = $this;

		$this->loop->addPeriodicTimer($time, function() use($topic, $data, $that) {
			$that->topics[$topic]->publish($data);
		});

	}

	public function __get($topic = null) {
		if(isset($this->topics[$topic])) {
			return $this->topics[$topic];
		}

		throw new \Exception("Topic Not Found: $topic");
	}
	
}