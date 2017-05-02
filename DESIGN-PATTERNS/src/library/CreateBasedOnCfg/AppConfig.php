<?php
namespace src\library\CreateBasedOnCfg;

class AppConfig
{
	private static $_instance;
	private $_commsManager;

	private function ___construct()
	{
		//will run only once
		$this->init();
	}

	private function init()
	{
		switch(Settings::$COMMSTYPE)
		{
			case 'Mega':
				$this->_commsManager = new MegaCommsManager();
				break;
			case 'Bloggs':
				$this->_commsManager = new BloggsCommsManager();
				break;
			default:
				$this->_commsManager = new BloggsCommsManager();
		}
	}

	public static function getInstance()
	{
		if(empty(self::$_instance))
		{
			self::$_instance = new self();	
		}
		return self::$_instance;
	}

	public function getCommsManager()
	{
		return $this->_commsManager;	
	}

	
}
