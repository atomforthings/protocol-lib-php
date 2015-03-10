<?php

namespace Atom\Protocol\Topic;

use Evenement\EventEmitter;

abstract class AbstractTopic extends EventEmitter implements TopicInterface {

	private $name;
	private $lastValue;

	function __construct($name) {
		$this->name = $name;
	}

	public function __get($name) {
		return $this->$name;
	}

	public function publish($value) {
		$this->lastValue = $value;
		$that = $this;
		$this->emit('published', array($that->lastValue, $that));
	}
	
}