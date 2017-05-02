<?php 
namespace tests\library\Prototype;
use src\library\Prototype\CommsManager;
use src\library\Prototype\BloggsApptEncoder;
use src\library\Prototype\BloggsTtdEncoder;
use src\library\Prototype\BloggsContactEncoder;

class PrototypeTest extends \PHPUnit_Framework_TestCase
{
	public function testBloggsCommsManager()
	{
		
		$factory = new CommsManager(new BloggsApptEncoder, new BloggsTtdEncoder, new BloggsContactEncoder);
	print_r($factory->getApptEncoder()->encode());
	print_r($factory->getTtdEncoder()->encode());
	print_r($factory->getContactEncoder()->encode());
	$this->assertEquals("Appointment data encode in BloogsCal format \n" , $factory->getApptEncoder()->encode());
	}
}
