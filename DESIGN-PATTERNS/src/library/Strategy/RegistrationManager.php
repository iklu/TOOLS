<?php 
namespace src\library\Strategy;

class RegistrationManager 
{
	public function register(Lesson $lesson)
	{
		$notifier = Notifier::getNotifier();
		$notifier->inform("new lesson: cost ({$lesson->cost()})");
	}
}
