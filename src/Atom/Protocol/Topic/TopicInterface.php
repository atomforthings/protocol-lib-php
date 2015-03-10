<?php

namespace Atom\Protocol\Topic;

use Evenement\EventEmitterInterface;

interface TopicInterface extends EventEmitterInterface {

	function __construct($name);

	public function __get($name);

	public function publish($value);

}