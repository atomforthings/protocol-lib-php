<?php

namespace Atom\Protocol\Command;

/**
 * Atom Post Command
 *
 * Implementation of Post Command
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
class PublishCommand extends AbstractCommand  {

	/**
	 * @property constant VALUE binary value of Post Command
	 */
	const VALUE = 0b0010;

	public function __construct() {
		parent::__construct();
	}

}