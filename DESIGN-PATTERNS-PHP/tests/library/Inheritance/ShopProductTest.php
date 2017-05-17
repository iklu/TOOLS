<?php
namespace tests\library\Inheritance;
use src\library\Inheritance\BookProduct;
use src\library\Inheritance\CdProduct;

class ShopProductTest extends \PHPUnit_Framework_TestCase
{
	
	public function testCdProduct()
	{		
		$product1 = new CdProduct(array(	'title' => 'Summer Hits',
										'productType'=>'CD',
										'producerFirstName' => 'Ovidiu', 
										'producerMainName' => 'Production',
										'price' => 54.34,
										'playLength'=>1254,
									));
		 "Artist: {$product1->getProducer()}\n";
		 "Summary: {$product1->getSummaryLine()}\n";
		$product1->setDiscount(5.00);
		 "Price: {$product1->getPrice()}\n\n";
		$this->assertNotEmpty($product1->getProducer());
		$this->assertEquals(5.00, $product1->getDiscount());
		$this->assertEquals(54.34, $product1->getPrice());
	}
	
	
	public function testBookProduct()
	{
		
		$product2 = new BookProduct(array(	'title' => 'Programation',
				'productType'=>'Book',
				'producerFirstName' => 'Constantin',
				'producerMainName' => 'editure',
				'price' => 30.00,
				'numPages'=>500,
		));
		 "Artist: {$product2->getProducer()}\n";
		 "Summary: {$product2->getSummaryLine()}\n";
		 "Price: {$product2->getPrice()}\n";
		$this->assertNotEmpty($product2->getProducer());
	}
	
	
}

?>