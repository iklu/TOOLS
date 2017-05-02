<?php
namespace src\library\Decorator;

/**
*This class is a component of Decorator design pattern
*
*@author Ovidiu Dragoi
*/
abstract class ProcessRequest {

	/**
	*@param RequestHelper $req
	*/
	abstract function process(RequestHelper $req);
}