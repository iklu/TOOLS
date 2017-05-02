<?php 
namespace src\library\Composite;

class UnitScript
{
	static function joinExisting(Unit $newUnit, Unit $occupyingUnit)
	{
		$comp;
		if(!is_null($comp = $occupyingUnit->getComposite()))
		{
			$comp = new Army();
			$comp->addUnit($occupyingUnit);
			$comp->addUnit($newUnit);
		}
		return $comp;
	}
}
