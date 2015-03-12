<?php

namespace Atom\Protocol\Flag;

class AckFlag extends AbstractFlag {

	const VALUE = 0b0001;

	public function __construct() {
		parent::__construct();
	}

}