<?php

namespace Atom\Protocol\Command;

/**
 * Atom Error Command
 *
 * Implementation of Error Command
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
class ErrorCommand extends AbstractCommand  {

	/**
	 * @property constant VALUE binary value of Error Command
	 */
	const VALUE = 0b1001;

	public function __construct() {
		parent::__construct();
	}

}