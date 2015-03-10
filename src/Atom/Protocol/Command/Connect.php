<?php

namespace Atom\Protocol\Command;

class Connect extends AbstractCommand  {

	const VALUE = 0b0000;

	function __construct() {
		parent::__construct();
	}

}