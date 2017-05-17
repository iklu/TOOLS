<?php
namespace src\library\Inheritance;

abstract class ShopProductWriter 
{
	public function addProduct( ShopProduct $shopProduct )
	{
		$this->products[]=$shopProduct;
		return true;
	}
	
	abstract public function write();
}

?>
