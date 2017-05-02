<?php
namespace tests\library\User;


use src\library\User\User;







class UserTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var \Application\User
	 */
	private $user;
	public function setUp()
	{
		$this->user = new User(array('firstName' => 'FirstName',
				'lastName' => 'LastName', 'email' => 'example@test.com',
				'password' => 'password123'));
	}
	public function testValidInput()
	{
		//(1)asert if assigned value
		$this->assertTrue($this->user->isInputValid());
		
		//(2)asert if null value
		$this->user->email = null;
		$this->assertFalse($this->user->isInputValid());
	}
	public function testInValidInput()
	{
		//(3)asert if null value
		$this->user->email = null;
		$this->assertFalse($this->user->isInputValid());
	}
	public function testCreatedPassword()
	{
		//(4)asert if value equal
		$this->user->createPassword();
		$this->assertEquals(sha1('password123' .
							$this->user->salt),
							 $this->user->password);
		
		//(5)asert if not  equal
		$this->assertNotEquals(sha1(null), $this->user->password);
	}
	public function testEmptyPassword()
	{
		//(6)asert if not  equal
		$this->user->createPassword();
		$this->assertNotEquals(sha1(null), $this->user->password);
	}
	public function testValidPassword()
	{
		$this->user->createPassword();
		$this->assertTrue($this->user->verifyPassword('password123'));
	}
	public function testInvalidPassword()
	{
		$this->user->createPassword();
		$this->assertFalse($this->user->verifyPassword(null));
	}
	
	
}

?>