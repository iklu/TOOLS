<?php
namespace src\library\Factory;

class BloggsCommsManager extends CommsManager
{
	public function getHeaderText()
	{
		return "BloggsCal header \n";
	}

	public function getApptEncoder()
	{
		return new BloggsApptEncoder();
	}

	public function getTtdEncoder()
	{
		return new BloggsTtdEncoder();
	}

	public function getContactEncoder()
	{
		return new BloggsContactEncoder();
	}

	public function getFooterText()
	{
		return "BloggsCal footer\n";
	}
}
