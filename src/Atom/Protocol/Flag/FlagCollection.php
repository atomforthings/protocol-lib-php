<?php

namespace Atom\Protocol\Flag;

class FlagCollection implements FlagCollectionInterface {

	private $flags = array();

	function __construct(\Atom\Protocol\Flag\FlagInterface $flags = null) {
		if(count($flags) > 0) {
			foreach($flags as $flag) {
				array_push($this->flags, $flag);
			}
		} else {
			$this->flags = $flags;
		}
	}

	public function add(\Atom\Protocol\Flag\FlagInterface $flag) {
		array_push($this->flags, $flag);
	}
}