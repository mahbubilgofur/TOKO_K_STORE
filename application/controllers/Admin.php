<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
		if ($role_id == 2) {
			// Jika role_id adalah 2, arahkan ke halaman tertentu atau berikan pesan kesalahan
			redirect('home');
		}
		// Jika role_id adalah 1 atau jenis lain yang diizinkan, biarkan pengguna melanjutkan

	}
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/content');
		$this->load->view('admin/footer');
	}
	public function layout()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/navbar');
		$this->load->view('layout/content');
		$this->load->view('layout/footer');
	}
}
