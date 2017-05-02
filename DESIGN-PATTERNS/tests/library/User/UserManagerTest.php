<?php
namespace tests\library\User;

use src\library\User\UserManager;
use src\library\User\User;
use src\library\User\Mail;

/**
 * Testing class for UserManager
 * @author Ovidiu
 *
 */
class UserManagerTest extends \PHPUnit_Framework_TestCase
{
	public function testCreateUser()
	{
		//database connection 
		$db = new \PDO('mysql:host=localhost; port=3306; dbname=test','root','parola');
		$config = new \stdClass();
		
		//global variables
		$config->email = 'test@example.com';
		$config->site_url = 'http://example.com';		
		
		
		$user = new User(array('firstName' => 'FirtsName',
								'lastName' => 'LastName', 'email' => 'user@example.com',
								'password' => 'password123'));
		
		
		$email = new Mail();
		//$email = $this->getMock('Util\Mail');
		$userManager = new UserManager($email, $db, $config);
		$this->assertTrue($userManager->createUser($user));
		$this->assertEquals(sha1('password123'.$user->salt),$user->password);
		$this->assertTrue($user->userId > 0);
	}

}

?>
