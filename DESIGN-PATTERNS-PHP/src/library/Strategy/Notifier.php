<?php
 namespace src\library\Strategy;

abstract class Notifier
{
	public static function getNotifier()
	{
		if(rand(1,2)===1)
		{
			return new MailNotifier();
		}
		else
		{
			return new TextNotifier();
		}	
	}

	abstract function inform($message);
}
