<?php
namespace src\library\Strategy;
use src\library\Composition\Strategy;

class MailNotifier extends Notifier
{
	public function inform($message)
	{
		print "Mail notification : {$message}\n";
	}		
}
