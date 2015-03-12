<?php

namespace Atom\Protocol\Command;

/**
 * Atom Ack Command
 *
 * Implementation of Ack Command
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
class AckCommand extends AbstractCommand  {

	/**
	 * @property constant VALUE binary value of Ack Command
	 */
	const VALUE = 0b0111;

	public function __construct() {
		parent::__construct();
	}

}