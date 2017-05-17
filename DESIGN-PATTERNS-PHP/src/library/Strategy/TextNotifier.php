<?php 
namespace src\library\Strategy;

class TextNotifier extends Notifier 
{
	public function inform($message)
	{
		print "TEXT notification : {$message}\n";
	}
}
