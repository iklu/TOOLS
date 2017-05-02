<?php
namespace src\library\Strategy;
use src\library\Strategy\CostStrategy;

class FixedCostStrategy extends CostStrategy {
	public function cost( Lesson $lesson ) {
		return 30;
	}
	 
	public function chargeType() {
		return "fixed rate";
	}
}
 
