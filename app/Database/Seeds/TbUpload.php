<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TbUpload extends Seeder
{
	public function run()
	{
		$images = [
			'name_file' 		=> 'contoh images',
			'extension_file'    => 'jpg',
			'size_file'			=> '11365 KB',
			'file'				=> 'profile.jpg'
		];
		$mp3 = [
			'name_file' 		=> 'contoh mp3 ',
			'extension_file'    => 'mp3',
			'size_file'			=> '3038000 KB',
			'file'				=> 'bensound-creepy.mp3'
		];
		$xls = [
			'name_file' 		=> 'contoh xlsx',
			'extension_file'    => 'xlsx',
			'size_file'			=> '8548 KB',
			'file'				=> 'ExampleFile.xlsx'
		];

		// Using Query Builder
		$this->db->table('tb_upload')->insert($images);
		$this->db->table('tb_upload')->insert($mp3);
		$this->db->table('tb_upload')->insert($xls);
	}
}
