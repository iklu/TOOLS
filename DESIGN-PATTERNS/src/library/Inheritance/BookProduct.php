<?php
namespace src\library\Inheritance;
use src\library\Inheritance\ShopProduct;

class BookProduct extends ShopProduct
{
	/**
	 * 
	 * 
	 * @var integer
	 */
	protected $options;
	
	/**
	 * 
	 * @var unknown_type
	 */
	protected $numPages;
	
public function __construct(array $options ) 
	{		
			
		foreach($options as $key => $value)
		{
			//$this = class
			if(property_exists($this, $key))
			{	
				$this->{$key} = $value;
			}	
				
		}	
		//$this->playLength = $playLength;		
		parent::__construct($this->title,
							$this->productType,
							$this->producerFirstName,
							$this->producerMainName,
							$this->price,
							$this->numPages);
	 
	}
	
	function getNumberOfPages() 
	{
		return $this->numPages;
	}
	function getSummaryLine() 
	{
		$base = "{$this->title} ( {$this->producerMainName}, ";
		$base .= "{$this->producerFirstName} )";
		$base .= ": pages - {$this->numPages}";
		
		return $base;
	}
}

?>
