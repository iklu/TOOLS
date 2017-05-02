<?php
namespace src\library\Prototype;

class CommsManager
{
	private $apptencoder;
	private $ttdencoder;
	private $contactencoder;
	
	public function __construct(ApptEncoder $apptencoder, TtdEncoder $ttdencoder, ContactEncoder $contactencoder)
	{
		$this->apptencoder = $apptencoder;
		$this->ttdencoder = $ttdencoder;
		$this->contactencoder = $contactencoder;
	}

	public function getApptEncoder()
	{
		return clone $this->apptencoder;
	}

	public function getTtdEncoder()
	{
		return clone $this->ttdencoder;
	}

	public function getContactEncoder()
	{
		return clone $this->contactencoder;
	}
}
