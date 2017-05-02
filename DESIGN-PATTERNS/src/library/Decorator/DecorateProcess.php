<?php
namespace src\library\Decorator;

/**
*This class is a component of Decorator design pattern
*
*@author Ovidiu Dragoi
*/
abstract class DecorateProcess  extends ProcessRequest {

	/**
	*
	* @var $processrequest
	*/
	protected $processrequest;

	/**
	* Constructor 
	*
	* @param ProcessRequest $pr
	*/
	public function __construct( ProcessRequest $pr ) {
		$this->processrequest = $pr;
	}
}