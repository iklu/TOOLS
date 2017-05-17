<?php
namespace src\library\Strategy;
use src\library\Strategy\CostStrategy;

class TimedCostStrategy extends CostStrategy 
{
	public function cost( Lesson $lesson ) {
		return ( $lesson->getDuration() * 5 );
	}
	public function chargeType() {
		return "hourly rate";
	}
}
