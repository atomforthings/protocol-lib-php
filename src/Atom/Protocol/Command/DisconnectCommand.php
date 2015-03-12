<?php

namespace Atom\Protocol\Command;
/**
 * Atom Disconnect Command
 *
 * Implementation of Disconnect Command
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
class DisconnectCommand extends AbstractCommand  {

	/**
	 * @property constant VALUE binary value of Disconnect Command
	 */
	const VALUE = 0b0001;

	public function __construct() {
		parent::__construct();
	}

}