<?php

namespace Atom\Protocol\Command;

/**
 * Atom Command Interface
 *
 * This interface implements the 4 bit command used in Atom's Frame
 *
 */
interface CommandInterface {

	/**
	 * returns binary string representation of implemented command
	 * @return string
	 */
	function __toString();
	/**
	 * returns decimal representation of implemented command
	 * @return number
	 */
	function toDecimal();
	/**
	 * returns hexadecimal code representation of implemented command
	 * @return hex
	 */
	function toHex();
	/**
	 * returns binary string representation of implemented command
	 * @return string
	 */
	function toBinary();
	function setFlags(\Atom\Protocol\Flag\FlagCollectionInterface $flags);

}