<?php
namespace src\library\Inheritance;
use src\library\Inheritance\ShopProduct;

class CdProduct extends ShopProduct
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
	protected $playLength;
	
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
							$this->playLength);
	 
	}
	public function getPlayLength() 
	{
		return $this->playLength;
	}
	
	public function getSummaryLine() 
	{
		$base = "{$this->title} ( {$this->producerMainName}, ";
		$base .= "{$this->producerMainName} )";
		$base .= ": playing time - {$this->playLength}";		
		return $base;
	}
}

?>