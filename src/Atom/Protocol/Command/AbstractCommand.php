<?php

namespace Atom\Protocol\Command;

/**
 * Atom Command Abstract Class
 *
 * This abstract class implements the 4 bit command used in Atom's Frame
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
abstract class AbstractCommand implements CommandInterface {

	const VALUE = null;

	public function __construct() {}

	/**
	 * returns binary string representation of implemented command
	 * @return string
	 */
	public function __toString() {
		return sprintf("%'04b", $this::VALUE);
	}
	
	/**
	 * returns decimal representation of implemented command
	 * @return number
	 */
	public function toDecimal() {
		return sprintf("%02u", $this::VALUE);
	}

	/**
	 * returns hexadecimal code representation of implemented command
	 * @return hex
	 */
	public function toHex() {
		return sprintf("%02X", $this::VALUE);
	}

	/**
	 * returns binary string representation of implemented command
	 * @return string
	 */
	public function toBinary() {
		return sprintf("%'04b", $this::VALUE);
	}

	public function setFlags(\Atom\Protocol\Flag\FlagCollectionInterface $flags) {

	}

}