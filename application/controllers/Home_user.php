<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Memeriksa apakah pengguna telah login
		if (!$this->session->userdata('email')) {
			redirect('login_user');
		}

		// Mendapatkan role_id dari sesi
		$role_id = $this->session->userdata('role_id');

		// Menambahkan kondisi untuk role_id
		if ($role_id == 1) {
			redirect('admin');
		}
		// Jika role_id adalah 1 atau jenis lain yang diizinkan, biarkan pengguna melanjutkan

		$this->load->model('M_kategori');
	}

	public function index()
	{
		$this->load->view('home_user/header');
		$this->load->view('home_user/navbar');
		$this->load->view('home_user/content');
		$this->load->view('home_user/footer');
	}
}
