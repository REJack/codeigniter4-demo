<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $useTimestamps = true;

	protected $allowedFields = [
		'email',
		'password',
		'username',
	];

	public function __construct($db = null)
	{
		parent::__construct();

		$this->table = 'users';

		$this->validationRules['email']    = 'required|valid_email|is_unique[' . $this->table . '.email,id,{id}]';
		$this->validationRules['password'] = 'required';
		$this->validationRules['username'] = 'required|is_unique[' . $this->table . '.username,id,{id}]';

	}
}
