<?php
namespace src\library\Composite;

class LaserCannonUnit extends Unit
{
	public function addUnit(Unit $unit)
	{
		throw new UnitException(get_class($this)."is a leaf");
	}
	
	public function removeUnit(Unit $unit)
	{
		throw new UnitException(get_class($this)."is a leaf");
	}

	public function bombardStrength()
	{
		return 23;
	}
}
