<?php
namespace src\library\Inheritance;

interface ChargeableInterface 
{
	/**
     * Sets the ID.
     *
     * @param int $id
     *
     * @return self
     */
	public function setProductID($productID);
	
	/**
	 * Gets ProductId
	 * 
	 * @return int
	 */
	public function getProductId();
	
	/**
     * Sets the title.
     *
     * @param string $title
     *
     * @return self
     */
	public function setTitle($title);
	
	/**
	 * Gets title.
	 *
	 * @return string
	 */
	public function getTitle();
	
	/**
	 * Sets the type
	 * 
	 * @param string $type
	 * 
	 * @return self
	 */
	public function setType($type);
	
	/**
	 * Gets type.
	 * 
	 * @return string
	 */
	public function getType();
	
	/**
	 * Sets producerFirstName.
	 * 
	 * @param string $firstName
	 * 
	 * @return self
	 */
	public function setFirstName($firstName);
	
	/**
	 * Gets producerFirstName.
	 * 
	 * @return string
	 */
	public function getFirstName();
	
	/**
	 * Sets producerMainName
	 * 
	 * @param string $mainName
	 * 
	 * @return self
	 */
	public function setMainName($mainName);
	
	/**
	 * Gets producerMainName.
	 * 
	 * @return string
	 */	
	public function getMainName();
	
	/**
	 * Sets discount
	 * 
	 * @param float $discount
	 * 
	 * @return self
	 */
	public function setDiscount($discount);
	
	/**
	 * Gets discount.
	 * 
	 * @return float
	 */
	public function getDiscount();
	
	/**
	 * Sets price.
	 * 
	 * @param double $price
	 * 
	 * @return self
	 */
	public function setPrice($price);
	
	/**
	 * Gets price.
	 * 
	 * @return float
	 */
	public function getPrice();
	
	
}

?>
