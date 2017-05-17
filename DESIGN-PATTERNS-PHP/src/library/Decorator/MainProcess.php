<?php
namespace src\library\Decorator;


/**
*This class is a component of Decorator design pattern
*
*@author Ovidiu Dragoi
*/
class MainProcess extends ProcessRequest {

	/**
	*@param RequestHelper $req
	*/
	function process(RequestHelper $req ) {
		print __CLASS__.": doing something useful with request\n";
	}
}