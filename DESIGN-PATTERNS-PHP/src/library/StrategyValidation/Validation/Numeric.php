<?php
namespace src\library\StrategyValidation\Validation;
use src\library\StrategyValidation\Validation;

class Numeric extends ValidationStrategy 
{
	public function validateData(Validation $validate) {
		if(!strlen($validate->data) || !is_numeric($validate->data) || $validate->data <= 0) {
		 	return false;
		} else {
			return true;
		}
	}
	public function getMessageValidation() {
		return $this->message;
	}
}
