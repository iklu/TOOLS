<?php
namespace tests\library\Strategy;
use src\library\Strategy\Lecture;
use src\library\Strategy\Seminar;
use src\library\Strategy\Lesson;
use src\library\Strategy\TimedCostStrategy;
use src\library\Strategy\FixedCostStrategy;
use src\library\Strategy\RegistrationManager;

class LessonTest extends \PHPUnit_Framework_TestCase
{
	public function testLessonCostAndChargeType()
	{
		$lessons[] = new Seminar( 4, new TimedCostStrategy() );
		$lessons[] = new Lecture( 4, new FixedCostStrategy() );
		
		$mgr = new RegistrationManager();
 
		foreach ( $lessons as $lesson ) 
		{
			print "lesson charge {$lesson->cost()}.\n ";			
			print "Charge type: {$lesson->chargeType()}\n";
			$mgr->register($lesson);	
		}
	
	}	
	  
}
