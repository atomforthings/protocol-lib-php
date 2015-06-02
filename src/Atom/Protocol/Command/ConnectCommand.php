<?php

namespace Atom\Protocol\Command;

/**
 * Atom Connect Command
 *
 * Implementation of Connect Command
 *
 * @author     Neeraj Kumar <hello@neerajkumar.name>
 * @copyright  2015 Neeraj Kumar
 * @license    http://opensource.org/licenses/MIT  MIT License
 * 
 */
class ConnectCommand extends AbstractCommand  {

	/**
	 * @property constant VALUE binary value of Connect Command
	 */
	const VALUE = 0b0000;
	const IS_BODY_REQUIRED = false;
	const IS_BODY_ALLOWED = true;

	private $validFlags = [
		\Atom\Protocol\Flag\AckFlag::VALUE
	];

	private $requiredFlags = [
		\Atom\Protocol\Flag\AckFlag::VALUE
	];

	public function __construct() {
		parent::__construct();
	}

}