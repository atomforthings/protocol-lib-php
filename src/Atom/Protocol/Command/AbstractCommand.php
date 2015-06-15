<?php

namespace Atom\Protocol\Command;

use Atom\Protocol\Flag\FlagInterface;

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
	const IS_BODY_REQUIRED = null;
	const IS_BODY_ALLOWED = null;

	private $validFlags = [];
	private $requiredFlags = [];

	public function __construct() {}

	/**
	 * Checks whether a flag is valid for this command or not
	 * @param  FlagInterface $flag Flag to be tested
	 * @return boolean
	 */
	public function isValidFlag(FlagInterface $flag) {
		return in_array($flag, $this->validFlags);
	}
	
	/**
	 * returns binary string representation of implemented command
	 * @return string
	 */
	public function __toString() {
		return sprintf("%'04b", $this::VALUE);
	}
	
	/**
	 * returns decimal representation of implemented command
	 * @return string decimal string representation
	 */
	public function toDecimal() {
		return sprintf("%02u", $this::VALUE);
	}

	/**
	 * returns hexadecimal string representation of implemented command
	 * @return string hex string representation
	 */
	public function toHex() {
		return sprintf("%02X", $this::VALUE);
	}

	/**
	 * returns binary string representation of implemented command
	 * @return string binary string representation
	 */
	public function toBinary() {
		return sprintf("%'04b", $this::VALUE);
	}

}