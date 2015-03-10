<?php

namespace Atom\Protocol\Flag;

interface FlagInterface {

	function __toString();

	function toDecimal();
	function toHex();
	function toBinary();
		
}