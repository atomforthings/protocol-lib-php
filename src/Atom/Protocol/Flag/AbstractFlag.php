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
abstract class AbstractFlag implements FlagInterface {

	protected $isEnbaled = true;

	public function __construct($enable = true) {
		if(!isset(static::$value))
            throw new \Exception(get_called_class() . ' must define a static $value');

		$this->isEnbaled = $enable;
	}

	/**
	 * enables a flag
	 * @return $this
	 */
	public function enable() {
		$this->isEnbaled = true;
		return $this;
	}

	/**
	 * disables a flag
	 * @return $this
	 */
	public function disable() {
		$this->isEnbaled = false;
		return $this;
	}

	/**
	 * returns binary string representation of implemented flag
	 * @return string
	 */
	public function __toString() {
		return sprintf("%'04b", $this::$value);
	}
	
	/**
	 * returns decimal representation of implemented flag
	 * @return string decimal string representation
	 */
	public function toDecimal() {
		return sprintf("%02u", $this::$value);
	}

	/**
	 * returns hexadecimal string representation of implemented flag
	 * @return string hex string representation
	 */
	public function toHex() {
		return sprintf("%02X", $this::$value);
	}

	/**
	 * returns binary string representation of implemented flag
	 * @return string binary string representation
	 */
	public function toBinary() {
		return sprintf("%'04b", $this::$value);
	}

}