<?php
namespace src\library\Inheritance;


abstract class Lesson 
{
	protected $duration;
	const FIXED = 1;
	const TIMED = 2;
	private $costtype;
	 
	public function __construct( $duration, $costtype=1 ) 
	{
		$this->duration = $duration;
		$this->costtype = $costtype;
	}
	 
	public function cost() 
	{
		switch ( $this->costtype ) 
		{
			CASE self::TIMED :
				return (5 * $this->duration);
				break;
			CASE self::FIXED :
				return 30;
				break;
			default:
				$this->costtype = self::FIXED;
				return 30;
		}
	}
	
	public function chargeType() {
		switch ( $this->costtype ) 
		{
			CASE self::TIMED :
				return "hourly rate";
				break;
			CASE self::FIXED :
				return "fixed rate";
				break;
				default:
			$this->costtype = self::FIXED;
				return "fixed rate";
		}
	}
}	
