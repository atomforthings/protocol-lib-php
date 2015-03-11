<?php

/**
 * Frame Class for Atom for Things Protocol
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @link       http://pear.php.net/package/PackageName
 * @since      File available since Release 0.0.1
 */

namespace Atom\Protocol;

use Atom\Protocol\Command as Command;
use Atom\Protocol\Command\CommandInterface as CommandInterface;
use Atom\Protocol\Flag\FlagCollectionInterface as FlagCollectionInterface;
use Atom\Protocol\Exception\FrameException as FrameException;

class Frame {

	private $command;
    private $flags;
	private $fixedHeader;
	private $variableHeader;
	private $body;

	public function __construct(CommandInterface $command, FlagCollectionInterface $flags, $body = '') {
		$this->command = $command;
        $this->flags = $flags;
        $this->body = $body;

        return $this;
	}

    public function setBody($body = null) {
        if(is_null($body)) {
            return false;
        }

        $this->body = $body;
        return $this;
    }

    public function isValid() {
    	return true;
    }

    private function getFixedHeader() {
    	return $this->command . $this->flags;
    }

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

    private function prepFrame() {
    	return bindec($this->getFixedHeader()).bindec($this->getVariableHeader()).$this->body;
    }

	public function __toString() {
		return sprintf($this->prepFrame());
	}
}