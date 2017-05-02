<?php
namespace src\library\Decorator;

/**
*This class is a component of Decorator design pattern
*
*@author Ovidiu Dragoi
*/
class StructureRequest extends DecorateProcess {

	/**
	* @param ProcessRequest $pr
	*/
	public function process( RequestHelper $req ) {
		print __CLASS__.": structuring request data\n";
		$this->processrequest->process( $req );
	} 
}