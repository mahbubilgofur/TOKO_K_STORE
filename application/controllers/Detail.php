<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// Memeriksa apakah pengguna telah login
		if (!$this->session->userdata('email')) {
			redirect('login');
		}

		// Mendapatkan role_id dari sesi
		$role_id = $this->session->userdata('role_id');

		// Menambahkan kondisi untuk role_id
		if ($role_id == 1) {
			redirect('admin');
		}
	}
	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('detail/detail');
		$this->load->view('home/footer');
	}
}
