<?php
namespace src\library\Inheritance;
use src\library\Inheritance\PriceUtilities;

class Discount 
{
	use PriceUtilities 
	{
		PriceUtilities::calculateTax as private;
	}
	
	protected $procentDiscount;
	protected $maxProducts;
	protected $productType;
	protected $taxRate;
	
	
	
	public function setProcentDiscount($procentDiscount)
	{
		$this->procentDiscount = $procentDiscount;
		return $this;
	}
	
	public function setMaxProductsDiscount($maxProducts)
	{
		$this->maxProducts = $maxProducts;
		return $this;
	}
	
	public function setProductType($productType)
	{
		$this->productType = $productType;
		return $this;
	}
	
	public function setTaxRate($tax, $price)
	{
		self::setTax($tax);
		$this->taxRate = self::calculateTax($price);
		return $this;
	}
	
	public function getTaxRate()
	{
		return $this->taxRate;
	}
	
	public function calculate()
	{
		
	}

}

?>