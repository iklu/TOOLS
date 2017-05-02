<?php
namespace tests\library\StrategyValidation;
use src\library\StrategyValidation\Validation\Required;
use src\library\StrategyValidation\Validation\Numeric;
use src\library\StrategyValidation\Validation\Email;
use src\library\StrategyValidation\Validation;
use src\library\StrategyValidation\Validation\ValidationStrategy;


class ValidationTest extends \PHPUnit_Framework_TestCase
{
	public function testValidation()
	{
		$zip = 123;
		$required  = '';
		$email = 'dragoi@ovidiu.com';

		$validation[] = new Validation($zip, new  Numeric('This should contain only numeric'));
		$validation[] = new Validation($required, new  Required('Is required'));
		$validation[] = new Validation($email, new  Email('This is not a valid email'));
		

		//$mgr = new ValidationManager();
 
		foreach ( $validation as $valid ) 
		{
			if(!$valid->validateData()) {
				echo $valid->getMessageValidation()."\n";
			}
		}
	
	}	
	  
}