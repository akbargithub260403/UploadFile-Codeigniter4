<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadModel extends Model
{
	protected $table                = 'tb_upload';

	protected $allowedFields        = ['name_file','extension_file','size_file','file'];
}
