<?php
namespace src\library\StrategyValidation\Validation;
use src\library\StrategyValidation\Validation;

class Email extends ValidationStrategy 
{
	public function validateData(Validation $validate ) {
		if(strlen($validate->data) && !preg_match("/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $validate->data)) {
			return false;
		} else {
			return true;
		}
	}
	public function getMessageValidation() {
		return $this->message;
	}
}