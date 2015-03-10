<?php

/**
 * Frame Class for Atom for Things Protocol
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @version    GIT: $Id$
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

	public function ___construct(CommandInterface $command = null, FlagCollectionInterface $flags = null, $body = null) {
		$this->command = $command;
        $this->flags = $flags;
        $this->body = $body;
	}

    public function withData($data) {
        return $this->text2bin($data);
    }

    public function setFlags(FlagCollectionInterface $flags) {
        
    }
    
    public function setBody($body) {
        $this->body = $body;
    }
	
    private function isValid() {
    	return true;
    }

    private function getFixedHeader() {
    	return $this->command . '0000';
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
    	return bindec($this->getFixedHeader().$this->getVariableHeader()).$this->body;
    }

	public function __toString() {
		return sprintf($this->prepFrame());
	}

    private function bin2text($bin_str) { 
        $text_str = ''; 
        $chars = explode("\n", chunk_split(str_replace("\n", '', $bin_str), 8)); 
        $_i = count($chars); 
        for($i = 0; $i < $_i; $text_str .= chr(bindec($chars[$i])), $i++  ); 
        return $text_str;
    }
 
    private function text2bin($str) {
        $out=false; 
        for($a=0; $a < strlen($str); $a++) {
            $out .= sprintf('%08d', base_convert(ord(substr($str,$a,1)), 10, 2));
        }
        return $out;
    }
		
}