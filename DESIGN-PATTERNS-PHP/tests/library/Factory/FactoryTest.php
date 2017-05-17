<?php
namespace tests\library\Factory;


use src\library\Factory\BloggsCommsManager;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
	public function testBloggsCommsManager()
	{
		$mgr = new BloggsCommsManager();
		print $mgr->getHeaderText();
		print $mgr->getApptEncoder()->encode();
		print $mgr->getTtdEncoder()->encode();
		print $mgr->getContactEncoder()->encode();
		print $mgr->getFooterText();
	}
}
