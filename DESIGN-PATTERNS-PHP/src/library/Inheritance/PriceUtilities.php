<?php
namespace src\library\Inheritance;

trait PriceUtilities 
{
	private static $taxrate = 17;
	public function setTax($taxrate)
	{
		self::$taxrate = $taxrate;		
	}
	public static function calculateTax( $price ) 
	{
		return ( ( self::$taxrate/100 ) * $price );
	}
	
	/**
	 * Sets taxrate.
	 *
	 * @param int $taxValue
	 * 
	 * @param float $price
	 *
	 * @return self
	 */
	abstract function setTaxRate($taxValue, $price);
	
	/**
	 * Gets taxrate
	 * 
	 * @return float
	 */
	abstract function getTaxRate();

}

?>