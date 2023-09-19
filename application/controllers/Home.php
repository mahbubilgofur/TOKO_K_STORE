<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Mendapatkan role_id dari sesi
		$role_id = $this->session->userdata('role_id');

		// Menambahkan kondisi untuk role_id
		if ($role_id == 1) {
			redirect('admin');
		}
		if ($role_id == 2) {
			redirect('home_user');
		}
		// Jika role_id adalah 1 atau jenis lain yang diizinkan, biarkan pengguna melanjutkan

	}

	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('home/content');
		$this->load->view('home/footer');
	}
	public function kartun()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homekategori/contentkartun');
		$this->load->view('home/footer');
	}
	public function olahraga()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homekategori/contentolahraga');
		$this->load->view('home/footer');
	}
	public function panjang()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homekategori/contentpanjang');
		$this->load->view('home/footer');
	}
	public function polos()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homekategori/contentpolos');
		$this->load->view('home/footer');
	}
	public function hitam()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homekategori/contenthitam');
		$this->load->view('home/footer');
	}
	public function keren()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homekategori/contentkeren');
		$this->load->view('home/footer');
	}
	public function anime()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homekategori/contentanime');
		$this->load->view('home/footer');
	}
	public function distro()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homekategori/contentdistro');
		$this->load->view('home/footer');
	}




	public function detail()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homedetail/content_detail');
		$this->load->view('homedetail/footer');
	}
}
