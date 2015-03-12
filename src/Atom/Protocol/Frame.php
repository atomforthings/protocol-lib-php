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
 * @link       http://pear.php.net/package/PackageName
 * @since      File available since Release 0.0.1
 */
class Frame {

	private $command;
    private $flags;
	private $body;

    /**
     * Atom Frame Constructor
     * 
     * @param CommandInterface        $command Command to be sent
     * @param FlagCollectionInterface $flags   Relevant Flags Collections from command
     * @param string                  $body    Body for the command to be sent
     */
	public function __construct(CommandInterface $command, FlagCollectionInterface $flags, $body = '') {
		$this->command = $command;
        $this->flags = $flags;
        $this->body = $body;
	}

    /**
     * Sets the body part of the command
     * 
     * @param mixed $body sets the body part of command
     * @todo  throw an exception in case of incompatibility
     */
    public function setBody($body = null) {
        if(is_null($body)) {
            return false;
        }

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
    	return true;
    }

    /**
     * return the fixed header part of the frame
     * @return binary returns binary string representation
     */
    private function getFixedHeader() {
    	return $this->command . $this->flags;
    }

    /**
     * returns the variable header part of the Atom frame
     * @return binary returns binary string representation
     */
    private function getVariableHeader() {
    	$len = strlen($this->body);
    	$result = null;
    		while($len > 0) {
    			$len = $len - 254;
    			if($len <= 0) {
    				$len = $len + 254;
    				$result .= sprintf("%'08b", $len);
    				$len = 0;
    			} else {
    				$result .= sprintf("%'08b", 254);
    			}
    		}
    	return $result;
    }

    /**
     * prepares the frame
     * @return dec returns decimal as string representation 
     */
    private function prepFrame() {
    	return bindec($this->getFixedHeader()).bindec($this->getVariableHeader()).$this->body;
    }

    /**
     * returns string representation of the frame
     * @return string
     */
	public function __toString() {
		return sprintf($this->prepFrame());
	}
}