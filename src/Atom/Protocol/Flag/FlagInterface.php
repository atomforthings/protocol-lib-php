<?php

namespace Atom\Protocol\Flag;

/**
 * Atom Flag Interface
 *
 * This interface implements the 4 bit flag used in Atom's Frame
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
interface FlagInterface {

	/**
	 * returns binary string representation of implemented flag
	 * @return string
	 */
	public function __toString();

	/**
	 * returns decimal representation of implemented flag
	 * @return string decimal string representation
	 */
	public function toDecimal();

	/**
	 * returns hexadecimal code representation of implemented flag
	 * @return string hex string representation
	 */
	public function toHex();

	/**
	 * returns binary string representation of implemented flag
	 * @return string binary string representation
	 */
	public function toBinary();

}