<?php
namespace Tests\Support\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_create_users_table extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'email' => [
				'type'       => 'VARCHAR',
				'constraint' => 254,
			],
			'username' => [
				'type'       => 'VARCHAR',
				'constraint' => 150,
				'null'       => true,
			],
			'password' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'deleted' => [
				'type'       => 'TINYINT',
				'constraint' => 1,
				'default'    => 0,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users', true);
	}

	public function down()
	{
		$this->forge->dropTable('users', true);
	}
}
