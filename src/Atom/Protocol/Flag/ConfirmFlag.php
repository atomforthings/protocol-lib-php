<?php

namespace Atom\Protocol\Flag;

class ConfirmFlag implements FlagInterface {

	const VALUE = 0b0001;

	function __toString() {
		return sprintf("%'04b", self::VALUE);
	}

	function toDecimal() {
		return sprintf("%02u", self::VALUE);
	}

	function toHex() {
		return sprintf("%02X", self::VALUE);
	}

	function toBinary() {
		return sprintf("%'04b", self::VALUE);
	}


}