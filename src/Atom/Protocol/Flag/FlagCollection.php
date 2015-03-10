<?php

namespace Atom\Protocol\Flag;

use Atom\Protocol\Flag;

class FlagCollection implements FlagCollectionInterface {

	private $flags = array();

	function __construct(Flag\FlagInterface $flag) {
		array_push($this->flags, $flag);		
	}

	public function add(Flag\FlagInterface $flag) {
		array_push($this->flags, $flag);
	}
}