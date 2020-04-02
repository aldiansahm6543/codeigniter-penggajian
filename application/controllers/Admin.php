<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Admin';
		$data['judul'] = 'Dashboard';
		$data['page'] = 'admin/dashboard';
		view('templates/content', $data);
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */