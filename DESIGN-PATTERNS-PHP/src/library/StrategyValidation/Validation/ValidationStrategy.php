<?php
namespace src\library\StrategyValidation\Validation;
use src\library\StrategyValidation\Validation;

abstract class ValidationStrategy {

	protected $message;

	public function __construct($message) {
		$this->message = $message;
	}	

	abstract function validateData(Validation $validation);

	abstract function getMessageValidation();
}