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

    const END_OF_FRAME = "\x00";
    
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
     * @param CommandInterface        $command Command to be sent
     * @param FlagCollectionInterface $flags   Relevant Flags Collections from command
     * @param string                  $body    Body for the command to be sent
     */
	public function __construct() {
        // CommandInterface $command, FlagCollectionInterface $flags, $body = '') {
		// $this->command = $command;
  //       $this->flags = $flags;
  //       $this->body = $body;
        
        // $this->setCommand(null);
        // $this->setFlags(null);
        // $this->setBody(null);
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
     */
    public function setFlags(FlagCollectionInterface $flags) {

        $this->flags = $flags;
        return $this;
    }

    /**
     * Retun the body part of this frame
     * 
     * @return false|string
     */
    public function getBody() {

        if(is_null($body)) {
            return false;
        }

        return $this->body = $body;
    }

    /**
     * Sets the body part of this frame
     * 
     * @param mixed $body sets the body part for this frame
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
     * 
     * @return binary returns binary string representation
     */
    private function getFixedHeader() {
    	return $this->command . $this->flags;
    }

    /**
     * returns the variable header part of the Atom frame
     * 
     * @return binary returns binary string representation
     * @deprecated this function is deprecated and will be removed soon
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
     * 
     * @return dec returns decimal as string representation 
     */
    private function prepFrame() {
    	return bindec($this->getFixedHeader()).$this->body . chr(0);
    }

    /**
     * returns string representation of the frame
     * 
     * @return string
     */
	public function __toString() {
		return sprintf($this->prepFrame());
	}
}