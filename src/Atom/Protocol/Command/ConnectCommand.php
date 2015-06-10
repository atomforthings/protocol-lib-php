<?php

namespace Atom\Protocol\Command;

use Atom\Protocol\Flag\AckFlag;

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

	public $validFlags = [
		'Atom\Protocol\Flag\AckFlag'
	];

	public $requiredFlags = [
		'Atom\Protocol\Flag\AckFlag'
	];

	public function __construct() {
		parent::__construct();
	}

}