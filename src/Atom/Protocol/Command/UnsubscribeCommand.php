<?php

namespace Atom\Protocol\Command;

/**
 * Atom Unsubscribe Command
 *
 * Implementation of Unsubscribe Command
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
class UnsubscribeCommand extends AbstractCommand  {

	/**
	 * @property constant VALUE binary value of Unsubscribe Command
	 */
	const VALUE = 0b0100;

	public function __construct() {
		parent::__construct();
	}

}