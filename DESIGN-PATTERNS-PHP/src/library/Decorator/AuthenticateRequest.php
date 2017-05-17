<?php
namespace src\library\Decorator;

/**
*This class is component of Decorator design pattern
*
*@author Ovidiu Dragoi
*/
class AuthenticateRequest extends DecorateProcess {

	/**
	* @param ProcessRequest $pr
	*/
	public function process( RequestHelper $req ) {
		print __CLASS__.": authenticating request\n";
		$this->processrequest->process( $req );
	} 
}