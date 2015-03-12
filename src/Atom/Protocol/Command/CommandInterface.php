<?php

namespace Atom\Protocol\Command;

/**
 * Atom Command Interface
 *
 * This interface implements the 4 bit command used in Atom's Frame
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
interface CommandInterface {

	/**
	 * returns binary string representation of implemented command
	 * @return string
	 */
	public function __toString();

	/**
	 * returns decimal representation of implemented command
	 * @return number
	 */
	public function toDecimal();

	/**
	 * returns hexadecimal code representation of implemented command
	 * @return hex
	 */
	public function toHex();

	/**
	 * returns binary string representation of implemented command
	 * @return string
	 */
	public function toBinary();

}