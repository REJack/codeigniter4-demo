<?php
namespace Tests\Demo;

use CodeIgniter\Test\CIDatabaseTestCase;
use App\Models\UserModel;

class UserModelTest extends CIDatabaseTestCase
{
	protected $refresh = true;

	public function setUp()
	{
		parent::setUp();

		$this->model = new UserModel($this->db);
	}

	//--------------------------------------------------------------------

	public function testInsertTrue()
	{
		$testUser = [
			'email' => 'admin@example.com',
			'password' => password_hash('password12345678', PASSWORD_BCRYPT),
			'username' => 'admin',
		];

		$this->assertEquals(1, $this->model->insert($testUser));
	}

	public function testInsertFalse()
	{
		$this->assertFalse(
			$this->model->insert([
				'email' => 'admin@example.com',
				'password' => password_hash('password12345678', PASSWORD_BCRYPT),
				'username' => '',
			])
		);

		$this->assertFalse(
			$this->model->insert([
				'email' => 'admin@example.com',
				'password' => password_hash('password12345678', PASSWORD_BCRYPT),
			])
		);
	}

	public function testInsertFalseNoUsername($value='')
	{
		$this->assertFalse(
			$this->model->insert([
				'email' => 'admin@example.com',
				'password' => password_hash('password12345678', PASSWORD_BCRYPT),
			])
		);
	}
}
