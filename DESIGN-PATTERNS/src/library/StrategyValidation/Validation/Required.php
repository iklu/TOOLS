<?php
namespace src\library\StrategyValidation\Validation;
use src\library\StrategyValidation\Validation;

class Required extends ValidationStrategy 
{
	public function validateData(Validation $validate ) {
		if(!strlen($validate->data)) {
			return false;
		} elseif (!empty($values)) {
			if(!in_array($validate->data, $values))
				return false;
		} else {
			return true;
		}
	}
	public function getMessageValidation() {
		return $this->message;
	}
}