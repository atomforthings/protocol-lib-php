<?php

namespace Atom\Protocol\Flag;

/**
 * Atom Flag Abstract Class
 *
 * This abstract class implements the 4 bit flag used in Atom's Frame
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
abstract class FlagCommand implements FlagInterface {

	const VALUE = null;

	public function __construct() {}

	/**
	 * returns binary string representation of implemented flag
	 * @return string
	 */
	public function __toString() {
		return sprintf("%'04b", $this::VALUE);
	}
	
	/**
	 * returns decimal representation of implemented flag
	 * @return number
	 */
	public function toDecimal() {
		return sprintf("%02u", $this::VALUE);
	}

	/**
	 * returns hexadecimal string representation of implemented flag
	 * @return hex
	 */
	public function toHex() {
		return sprintf("%02X", $this::VALUE);
	}

	/**
	 * returns binary string representation of implemented flag
	 * @return binary
	 */
	public function toBinary() {
		return sprintf("%'04b", $this::VALUE);
	}

}