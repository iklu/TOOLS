<?php
namespace src\library\Inheritance;

/**
 * save product to database
 * @author Ovidiu
 *
 */
class ShopProductManager 
{
	private $db;
	
	private $discount;
	
	private $config;
	
	public function __construct(Discount $discount, \PDO $db, $config)
	{
		$this->discount = $discount;
		$this->db = $db;
		$this->config = $config;
	}
	/**
	 * sends activation email
	 */
	private function calculateDiscount(ShopProduct $product)
	{
		
		
		$this->discount->setProcentDiscount($this->config->procentDiscount);
		$this->discount->setMaxProductsDiscount($this->config->maxProducts);
		$this->discount->setTaxRate($this->config->tax,$product->getPrice());
		
		$this->discount->setProductType($product->getType());
		
	
		return $this->discount->calculate();
	}
	
	/**
	* @param User $user
	* @return bool
	*/
	public function createProduct(ShopProduct $product)
	{
		if (!$product->isInputValid())
		{
			throw new \InvalidArgumentException('Invalid userdata');
		}
		
		self::calculateDiscount($product);
		
		$product->createProductKey();
		
		$title =  $product->getTitle();
		$productType = $product->getProductType();
		$firstName =	$product->getFirstName();
		$mainName = $product->getMainName();
		$price = $product->getPrice();
		$discount = $product->getDiscount();
		$productProperty = $product->getProductProperty();
		$productkey =  $product->getProductKey();
	
		/* @var $this->db \PDO */
		$sql = "INSERT INTO products(title, type, firstname, mainname, price, discount, productproperty, productkey) 
				VALUES (:title, :productType, :firstName,:mainName, :price, :discount, :productProperty, :productKey)";
	
		$statement = $this->db->prepare($sql);
		
		$statement->bindParam(':title',$title );
		$statement->bindParam(':productType',$productType );
		$statement->bindParam(':firstName',$firstName );
		$statement->bindParam(':mainName',$mainName );
		$statement->bindParam(':price',$price );
		$statement->bindParam(':discount',$discount );
		$statement->bindParam(':productProperty',$productProperty );	
		$statement->bindParam(':productKey',$productkey);
	
		if ($statement->execute())
		{
			
			 $product->productId = $this->db->lastInsertId();
			 $sql = 'SELECT * FROM products where productId =  :productID';
			 $stm = $this->db->prepare($sql);
			 $stm->execute(array(':productID' => $product->productId));
			 $stm->setFetchMode(\PDO::FETCH_CLASS, 'InvoiceItem');
			 $invoiceItem = $stm->fetch();
			 
			 foreach($invoiceItem as $key => $value)
			 {			  	
			  	if(!is_int( $key))
			 	{			  		
			  		$function = "set".ucfirst($key);
			  		$product->$function($value);
			  	}			  
			 }
		}
		else
		{
			throw new \Exception('Product wasn\'t saved:'.implode(':',$statement->errorInfo()));
		}
		return false;
	}
}

?>
