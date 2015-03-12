<?php

namespace Atom\Protocol\Command;

/**
 * Atom Nack Command
 *
 * Implementation of Nack Command
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
class NackCommand extends AbstractCommand  {

	/**
	 * @property constant VALUE binary value of Nack Command
	 */
	const VALUE = 0b1000;

	public function __construct() {
		parent::__construct();
	}

}