<?php
namespace src\library\Configuration;

class XmlException extends \Exception
{
	private $error;
	
	public function __construct( \LibXmlError $error )
	{
		$shortfile = basename( $error->file );
		$msg = "[{$shortfile}, line {$error->line}, col {$error->column}] {$error->message}";
		$this->error = $error;
		parent::__construct( $msg, $error->code );
	}
	
	public function getLibXmlError() 
	{
		return $this->error;
	}
}

?>