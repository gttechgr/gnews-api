<?php

namespace ErgonautTM\GNewsApi\Exceptions;

use Exception;

class GNewsApiException extends Exception
{
	public function errorMessage() {
		return "{$this->getMessage()} on line {$this->getLine()} in file {$this->getFile()}";
	}
}
