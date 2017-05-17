<?php
namespace src\library\Inheritance;
use src\library\Inheritance\Chargeable;


class ShopProduct implements ChargeableInterface {
	
	protected $title;
	protected $producerMainName;
	protected $producerFirstName;
	protected $price;	
	protected $salt;
	
	protected $productID;
	
	protected $product;
	
	/**
	 * 
	 * @var double
	 */
	protected $discount = 0;
	
	/**
	 * 
	 * @var string
	 */
	protected $productKey;
	
	/**
	 * 
	 * @var string
	 */
	protected $productType;
	
	/**
	 * 
	 * @var int
	 */
	protected $productProperty;
	

	
	/**
	 * 
	 * @param unknown_type $title
	 * @param unknown_type $productType
	 * @param unknown_type $producerFirstName
	 * @param unknown_type $producerMainName
	 * @param unknown_type $price
	 * @param unknown_type $productProperty
	 */
	public	function __construct( $title, $productType, $producerFirstName,$producerMainName, $price, $productProperty  ) 
	{		
		$this->title = $title;
		$this->productType = $productType;
		$this->producerFirstName = $producerFirstName;
		$this->producerMainName = $producerMainName;
		$this->price = $price;
		$this->productProperty = $productProperty;		
	}
	
	public function setProductID($productID)
	{
		 $this->productID = $productID;
		 return $this;
	}
	
	public function getProductID()
	{
		return $this->productID;
	}
	
	public function setTitle($title)
	{
		 $this->title=$title;
		 return $this;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setType($type)
	{
		 $this->productType=$type;
		 return $this;
	}
	
	public function getType()
	{
		return $this->productType;
	}
	
	public function setFirstName($firstName)
	{
		 $this->producerFirstName = $firstName;
		 return $this;
	}
	
	public function getFirstName()
	{
		return $this->producerFirstName;
	}
	
	public function setMainName($mainName)
	{
		$this->producerMainName = $mainName;
		return $this;
	}	
	
	
	public function getMainName()
	{
		return $this->producerMainName;
	}	
	
	public function setDiscount( $num ) 
	{
		 $this->discount=$num;	
		 return $this;
	}
	
	public function getDiscount()
	{
		return $this->discount;
	}
	
	public function setPrice($price)
	{
		$this->price = $price;
		return $this;
	}
	
	public	function getPrice()
	{
		return $this->price;
	}
	
	public function setProductProperty($productProperty)
	{
		$this->productProperty = $productProperty;
		return $this;
	}
	
	public function getProductProperty()
	{
		return $this->productProperty;
	}
	
	public function setProductKey($productKey)
	{
		$this->productKey = $productKey;
		return $this;
	}
	
	public function getProductKey()
	{
		return $this->productKey;
	}
	
	public	function getSummaryLine() 
	{
		$base = "$this->title ( {$this->producerMainName}, ";
		$base .= "{$this->producerFirstName} )";
		return $base;
	}
	
	public	function getProducer()
	{
		$product = "{$this->producerFirstName}"." {$this->producerMainName}";
		return $product;
	}
	
	public function getProductType()
	{
		return $this->productType;
	}
	
	/**
	 * validates properties
	 * @return bool
	 */
	public function isInputValid()
	{
		if (empty($this->title) || empty($this->producerFirstName) || empty($this->producerMainName) || empty($this->price) || empty($this->productProperty) || empty($this->productType))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	/**
	 * creates product hash
	 */
	public function createProductKey()
	{
		$this->salt = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
		$this->productKey = sha1($this->productKey . $this->salt);
	}
	
	/**
	 * verifies password
	 * @param string $password
	 * @return bool
	 */
	public function verifyProductKey($productKey)
	{
		return ($this->productKey === sha1($productKey .$this->salt));
	}
	
	
	
	public function setCreatedProduct($product)
	{
		$this->product=$product;
	}
	
	public function getCreatedProduct()
	{
		return $this->product;
	}
	
}

?>
