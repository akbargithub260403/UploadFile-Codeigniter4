<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UploadModel;
use CodeIgniter\I18n\Time;

class Upload extends BaseController
{
	protected $uploadModel;

	public function __construct()
	{
		$this->uploadModel 	= new UploadModel();
	}

	public function index()
	{
		$where = "extension_file='jpg' OR extension_file='jpeg' OR extension_file='png'";
		$data 		= $this->uploadModel->where($where)->findAll();

		return view('pages/images',['data' => $data]);
	}

	public function upload_images()
	{
		if (! $this->validate([
			'gambar' => 'uploaded[gambar]|ext_in[gambar,png,jpg,jpeg]'
		])) {
			// Jika Gagal terValidasi
			return redirect()->back()->with('gagal','Extension File harus jpg , jpeg , png');
		}

		// Jika berhasil TerValidasi
		$file 		= $this->request->getFile('gambar');
		$nama_file 	= $file->getClientName();
		$ext_file 	= $file->getClientExtension();
		$size_file 	= $file->getSize();

		// memindahkan file upload
		$file->move('images');

		$this->uploadModel->insert([
			'name_file'			=> $this->request->getVar('nama_file'),
			'extension_file'	=> $ext_file,
			'size_file'			=> $size_file.' KB',
			'file'				=> $nama_file
		]);

		return redirect()->back()->with('berhasil','Berhasil');

	}

	public function delete_images($id)
	{
		$data 			= $this->uploadModel->where('id',$id)->first();
		$nama_file 		= $data['file'];

		$delete_file 	= unlink(FCPATH.'images/'.$nama_file);

		$this->uploadModel->where('id',$id)->delete();

		return redirect()->back()->with('berhasil','Berhasil');

	}

	public function index_mp3()
	{
		$where = "extension_file='mp3' OR extension_file='mp4'";

		$data 		= $this->uploadModel->where($where)->findAll();

		return view('pages/mp3-mp4',['data'	=> $data]);
	}

	public function upload_mp3()
	{
		if (! $this->validate([
			'name_file'	=> 'required',
			'file' 		=> 'uploaded[file]|ext_in[file,mp3,mp4]'
		])) {
			// Jika Gagal terValidasi
			return redirect()->back()->with('gagal','Extension File harus mp3 atau mp4');
		}

		// Jika berhasil TerValidasi
		$file 		= $this->request->getFile('file');
		$nama_file 	= $file->getClientName();
		$ext_file 	= $file->getClientExtension();
		$size_file 	= $file->getSize();

		// memindahkan file upload
		$file->move('mp3_mp4');

		$this->uploadModel->insert([
			'name_file'			=> $this->request->getVar('name_file'),
			'extension_file'	=> $ext_file,
			'size_file'			=> $size_file.' KB',
			'file'				=> $nama_file
		]);

		return redirect()->back()->with('berhasil','Berhasil');
	}

	public function delete_mp3($id)
	{
		$data 			= $this->uploadModel->where('id',$id)->first();
		$nama_file 		= $data['file'];

		$delete_file 	= unlink(FCPATH.'mp3_mp4/'.$nama_file);

		$this->uploadModel->where('id',$id)->delete();

		return redirect()->back()->with('berhasil','Berhasil');
	}

	public function index_pdf()
	{
		$where = "extension_file='pdf' OR extension_file='xls' OR extension_file='xlsx'";

		$data 		= $this->uploadModel->where($where)->findAll();

		return view('pages/pdf-xls',['data'	=> $data]);
	}

	public function upload_pdf()
	{
		if (! $this->validate([
			'name_file'	=> 'required',
			'file' 		=> 'uploaded[file]|ext_in[file,pdf,xls,xlsx]'
		])) {
			// Jika Gagal terValidasi
			return redirect()->back()->with('gagal','Extension File harus pdf atau xls');
		}

		// Jika berhasil TerValidasi
		$file 		= $this->request->getFile('file');
		$nama_file 	= $file->getClientName();
		$ext_file 	= $file->getClientExtension();
		$size_file 	= $file->getSize();

		// memindahkan file upload
		$file->move('pdf_xls');

		$this->uploadModel->insert([
			'name_file'			=> $this->request->getVar('name_file'),
			'extension_file'	=> $ext_file,
			'size_file'			=> $size_file.' KB',
			'file'				=> $nama_file
		]);

		return redirect()->back()->with('berhasil','Berhasil');
	}

	public function delete_pdf($id)
	{
		$data 			= $this->uploadModel->where('id',$id)->first();
		$nama_file 		= $data['file'];

		$delete_file 	= unlink(FCPATH.'pdf_xls/'.$nama_file);

		$this->uploadModel->where('id',$id)->delete();

		return redirect()->back()->with('berhasil','Berhasil');
	}
}
