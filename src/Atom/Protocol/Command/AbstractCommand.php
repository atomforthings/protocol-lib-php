<?php

namespace Atom\Protocol\Command;

abstract class AbstractCommand implements CommandInterface {

	const VALUE = null;

	function __construct() {
		;
	}

	function __toString() {
		return sprintf("%'04b", $this::VALUE);
	}

	function toDecimal() {
		return sprintf("%02u", $this::VALUE);
	}

	function toHex() {
		return sprintf("%02X", $this::VALUE);
	}

	function toBinary() {
		return sprintf("%'04b", $this::VALUE);
	}

	function setFlags(\Atom\Protocol\Flag\FlagCollectionInterface $flags) {

	}

}