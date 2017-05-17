<?php
namespace tests\library\Inheritance;
use src\library\Inheritance\BookProduct;
use src\library\Inheritance\CdProduct;
use src\library\Inheritance\Discount;
use src\library\Inheritance\ShopProductManager;
use src\library\Inheritance\XmlProductWriter;
use src\library\Inheritance\TestAccessInterface;

class ShopProductManagerTest  extends \PHPUnit_Framework_TestCase
{
	public function testCreateCdProduct()
	{

		echo "CREATE CD PRODUCT ============================================================>\n";
		//database connection
		$db = new \PDO('mysql:host=localhost; port=3306; dbname=test','root','userovidiu');
		$config = new \stdClass();
		
		//global variables
		$config->procentDiscount = 30;
		$config->maxProducts=10;
		$config->tax = 99;

		//discount
		$discount = new Discount();
		//prepare to save product to database
		$pm = new ShopProductManager($discount, $db, $config);
		$product = new CdProduct(array(	'title' => 'Dj LOco',
			'productType'=>'CD',
			'producerFirstName' => 'Ovidiu',
			'producerMainName' => 'Production',
			'price' => 54.34,
			'playLength'=>1254,
		));

		//save product to database
		$pm ->createProduct($product);


		$discount->getTaxRate();

		$cdInfo = new TestAccessInterface();
		$cdInfo->cdInfo($product);
		
	     $product->getTitle();
		 $product->getType();
		 $product->getProductID();
		 $product->getFirstName();
		 $product->getMainName();
		 $product->getPrice();
		 $product->getProductProperty();
		 $product->getPlayLength();
		 
		 $productKey = $product->getProductKey();
		 $product->getSummaryLine();		 
		 $product->verifyProductKey($productKey);
		 $product->setCreatedProduct($product);
		 $product->getCreatedProduct();
		
		
	}
	
	public function testCreateBookProduct()
	{
		echo "CREATE BOOK PRODUCT ==========================================================>\n";
		//database connection
		$db = new \PDO('mysql:host=localhost; port=3306; dbname=test','root','userovidiu');
		$config = new \stdClass();
	
		//global variables
		$config->procentDiscount = 80;
		$config->maxProducts=250;
		$config->tax = 30;
	
		$product = new BookProduct(array('title' => 'Programation',
											'productType'=>'Book',
											'producerFirstName' => 'Constantin',
											'producerMainName' => 'Editorial',
											'price' => 30.25,
											'numPages'=>3500,
		));
	
		$discount = new Discount();
	
		$pm = new ShopProductManager($discount, $db, $config);
		$pm ->createProduct($product);
	
		 $product->getNumberOfPages();
		 
		 
		 $writer = new XmlProductWriter();
		 $writer->addProduct($product);
		 $writer->write();
		
		
	}

}

?>
