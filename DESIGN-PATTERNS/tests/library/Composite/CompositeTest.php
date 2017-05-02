<?php 
namespace tests\library\Composite;
use src\library\Composite\Army;
use src\library\Composite\Archer;
use src\library\Composite\LaserCannonUnit;
use src\library\Composite\UnitScript;

class CompositeTest extends \PHPUnit_Framework_TestCase
{
	public function testAddUnit()
	{       //archer 4
		//lasercannon 23
		$main_army = new Army();		
		$main_army->addUnit(new Archer());
		$main_army->addUnit(new LaserCannonUnit());

		$sub_army = new Army();
		$sub_army->addUnit(new Archer());
		
		$under_army = new Army();
		$under_army->addUnit(new Archer());
		
		$joined_army = UnitScript::joinExisting($main_army, $sub_army);
		
		$join_second_army = UnitScript::joinExisting($joined_army, $under_army);
	
		echo	$join_second_army->bombardStrength(); } }
