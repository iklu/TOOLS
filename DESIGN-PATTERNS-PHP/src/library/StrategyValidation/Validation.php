<?php
namespace src\library\StrategyValidation;
use src\library\StrategyValidation\Validation\ValidationStrategy;
use src\library\Strategy\Validation\Numeric;
use src\library\Strategy\Validation\Required;
use src\library\Strategy\Validation\Email;

 class Validation {
	public  $data;
	private $validationStrategy;
	 
	public function __construct($data, ValidationStrategy $validationStrategy ) {
		$this->data = $data;
		$this->validationStrategy = $validationStrategy;
	}
	 
	public function validateData() {
		return $this->validationStrategy->validateData($this);
	}
	 
	public function getMessageValidation() {
		return $this->validationStrategy->getMessageValidation( );
	}
	 
	public function getData() 
	{
		return $this->data;
	}

}
