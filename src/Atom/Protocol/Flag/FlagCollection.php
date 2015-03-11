<?php

namespace Atom\Protocol\Flag;

use Atom\Protocol\Flag;

class FlagCollection implements FlagCollectionInterface {

	private $flags = array();

	private $value = 0b0000;

	function __construct(Flag\FlagInterface $flag) {
		array_push($this->flags, $flag);
	}

	public function add(Flag\FlagInterface $flag) {
		array_push($this->flags, $flag);
	}

	public function __toString() {

		foreach($this->flags as $flag) {
			$this->value = ($this->value | $flag->toDecimal());
		}

		return sprintf("%'04b", $this->value);
	}
}