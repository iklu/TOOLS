<?php
 namespace src\library\Composite;

class Army extends CompositeUnit
{
	public function bombardStrength()
	{
		$ret = 0;
		foreach($this->units as $unit)
		{
			$ret += $unit->bombardStrength();
		}
		return $ret
;
	}
	

}
