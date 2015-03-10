<?php

use Atom\Protocol\Command;

class ConnectCommandTest extends PHPUnit_Framework_TestCase {

	public function testValue() {
		$connectCommand = new Command\ConnectCommand();

		$this->assertEquals('0000', $connectCommand);
	}
}