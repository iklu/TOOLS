<?php
namespace src\library\Inheritance;
use src\library\Inheritance\ShopProductWriter;

class TextProductWriter extends ShopProductWriter
{
	public function write()
	{
		$str = "PRODUCTS:\n";
		foreach($this->products as $shopProduct)
		{
			$str. = $shopProduct->getSummaryLine()."\n";
		}
		print $str;
	}
}



?>
