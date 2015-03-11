<?php

namespace Atom\Protocol\Flag;

abstract class AbstractFlag implements FlagInterface {

	const VALUE = 0b0000;

	public function __construct() {}

	public function __toString() {
		return sprintf("%'08b", $this::VALUE);
	}

	public function toDecimal() {
		return sprintf("%02u", $this::VALUE);
	}

	public function toHex() {
		return sprintf("%02X", $this::VALUE);
	}

	public function toBinary() {
		return sprintf("%'04b", $this::VALUE);
	}

}