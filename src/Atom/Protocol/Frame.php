<?php

namespace Atom\Protocol;

use Atom\Protocol\Command as Command;
use Atom\Protocol\Command\CommandInterface as CommandInterface;
use Atom\Protocol\Flag\FlagCollectionInterface as FlagCollectionInterface;
use Atom\Protocol\Exception\FrameException as FrameException;

/**
 * Frame Class for Atom for Things Protocol
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @link       http://github.com/atomforthings/protocol-lib-php
 * @since      File available since Release 0.0.1
 */
class Frame {

	/**
	 * The Command for the frame
	 * @var CommandInterface
	 */
	protected $command = null;
    
	/**
	 * The flags for the frame
	 * @var FlagCollectionInterface
	 */
	protected $flags = null;
    
	/**
	 * Th body for the frame
	 * @var string
	 */
	protected $body = null;

	/**
	 * Atom Frame Constructor
	 * 
	 */
	public function __construct() {
		;
	}
    
	/**
	 * Return the command for this frame
	 *
	 * Return false if the command does not exist
	 *
	 * @return false|\Atom\Protocol\Command
	 */
	public function getCommand() {
		return $this->command === null
			? false
			: $this->command;
	}

	/**
	 * Set the command for this frame
	 * 
	 * @param CommandInterface $command Command to be sent
	 * @return \Atom\Protocol\Frame
	 */
	public function setCommand(CommandInterface $command) {

		$this->command = $command;
		return $this;
	}

	/**
	 * Return the flags for this frame
	 *
	 * Returns flags for this frame
	 *
	 * @return \Atom\Protocol\FlagCollection
	 */
	public function getFlags() {

		return $this->flags;
	}

	/**
	 * Set the flags for this frame
	 * 
	 * @param FlagCollectionInterface $flags Flags to be set
	 * @return \Atom\Protocol\Frame
	 * @throws \Exception If Command is not set for this frame
	 */
	public function setFlags(FlagCollectionInterface $flags) {

		if ($this->command === null) {
			throw new \Atom\Protocol\Exception\FrameException('Command is not set');
		}
		$this->flags = $flags;
		return $this;
	}

	/**
	 * Retun the body part of this frame
	 * 
	 * @return false|string
	 */
	public function getBody() {

		if (is_null($this->body)) {
			return false;
		}

		return $this->body;
	}

	/**
	 * Sets the body part of this frame
	 * 
	 * @param mixed $body sets the body part for this frame
	 * @todo  throw an exception in case of incompatibility
	 */
	public function setBody($body = null) {

		if ($this->command === null) {
			throw \Atom\Protocol\Exception\FrameException('Command is not set');
		}

		if(!constant(get_class($this->command) . "::IS_BODY_REQUIRED") && is_null($body)) 
			throw new \Atom\Protocol\Exception\FrameException("Body is Required for " . get_class($this->command));

		$this->body = $body;
		return $this;
	}

	/**
	 * return wether the Frame is valid or not
	 * 
	 * @return boolean
	 * @todo implement check and throw an exception
	 */
	public function isValid() {

		if(!constant(get_class($this->command) . "::IS_BODY_REQUIRED") && is_null($this->body)) 
			throw new \Atom\Protocol\Exception\FrameException("Body is Required for " . get_class($this->command));
		return true;
	}

	/**
	 * return the fixed header part of the frame
	 * 
	 * @return binary returns binary string representation
	 */
	private function getFixedHeader() {
		return $this->command.$this->flags;
	}

	/**
	 * returns the variable header part of the Atom frame
	 * 
	 * @return string return hexadecimal representation of the body length
	 */
	private function getVariableHeader() {
		$len = strlen($this->body);
		$result = '';
			while ($len > 0) {
				$len = $len - 1294;
				if ($len <= 0) {
					$len = $len + 1294;
                    $result .= strtoupper(sprintf("%'02s", base_convert($len, 10, 36)));           
					$len = 0;
				} else {
                    $result .= strtoupper(sprintf("%'02s", base_convert(1295, 10, 36)));
				}
			}
		return $result;
	}

	/**
	 * prepares the frame
	 * 
	 * @return string returns decimal as string representation 
	 */
	private function prepFrame() {
		return bindec($this->getFixedHeader()).($this->getVariableHeader()).$this->body;
	}

	/**
	 * returns string representation of the frame
	 * 
	 * @return string
	 */
	public function __toString() {
		try {
			$this->isValid();
		} catch (\Exception $e) {
			trigger_error($e, E_USER_ERROR);
			return false;
		}
		return sprintf($this->prepFrame());
	}
}