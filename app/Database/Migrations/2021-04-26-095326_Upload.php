<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Upload extends Migration
{
	public function up()
	{
			$this->forge->addField([
					'id'          => [
							'type'           => 'INT',
							'constraint'     => 5,
							'unsigned'       => true,
							'auto_increment' => true,
					],
					'name_file'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '100',
					],
					'extension_file' => [
							'type'           => 'VARCHAR',
							'constraint'     => '100',
					],
					'size_file' => [
							'type'           => 'VARCHAR',
							'constraint'     => '100',
					],
					'file'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
					]
			]);
			$this->forge->addKey('id', true);
			$this->forge->createTable('tb_upload');
	}

	public function down()
	{
			$this->forge->dropTable('tb_upload');
	}
}