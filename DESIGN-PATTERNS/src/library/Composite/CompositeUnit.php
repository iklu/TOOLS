<?php
namespace src\library\Composite;

abstract class CompositeUnit  extends Unit
{
	protected $units = array();
	
	public function getComposite()
	{
		return $this;
	}	
	public function addUnit(Unit $unit)
	{
		if(in_array($unit, $this->units , true))
		{
		
			return;
		}
		$this->units[] = $unit;
	}

	public function removeUnit(Unit $unit)
	{
		$this->units = array_udiff($this->units , array($unit), function ($a, $b){ return ($a === $b)?0:1;});
	}

} 
