<?php

namespace Atom\Protocol\Command;

/**
 * Atom Get Command
 *
 * Implementation of Get Command
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
class GetCommand extends AbstractCommand  {

	/**
	 * @property constant VALUE binary value of Get Command
	 */
	const VALUE = 0b0110;

	public function __construct() {
		parent::__construct();
	}

}