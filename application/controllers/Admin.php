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
		$this->load->model('m_setting');
		$this->load->model('m_pesanan_masuk');
		$this->load->model('m_transaksi1');
		$this->load->model('m_produk');
		$this->load->model('m_user');
	}
	public function index()
	{
		$data['totalProduk'] = $this->m_produk->getJumlahProduk();
		$data['jumlahUser'] = $this->m_user->getJumlahUserByRoleId(2);
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/content', $data);
		$this->load->view('admin/footer');
	}
	public function layout()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/navbar');
		$this->load->view('layout/content');
		$this->load->view('layout/footer');
	}
	public function kirim($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'no_resi' => $this->input->post('no_resi'),
			'status_order' => '2'
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Dikirim!!!');
		redirect('admin/pesanan_masuk');
	}
	public function proses($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '1'
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Diperoses/Dikemas !!!');
		redirect('admin/pesanan_masuk');
	}
	public function pesanan_masuk()
	{
		$pesanan_diterima = $this->m_pesanan_masuk->pesanan_diterima();
		$pesanan_dikirim = $this->m_pesanan_masuk->pesanan_dikirim();
		$pesanan_diproses = $this->m_pesanan_masuk->pesanan_diproses();
		$pesanan = $this->m_pesanan_masuk->pesanan();
		$DATA = array('pesanan' => $pesanan, 'pesanan_diproses' => $pesanan_diproses, 'pesanan_dikirim' => $pesanan_dikirim, 'pesanan_diterima' => $pesanan_diterima);
		$this->load->view('layout/header');
		$this->load->view('admin/navbar');
		$this->load->view('pesananmasuk/content', $DATA, false);
		$this->load->view('layout/footer');
	}
	public function setting()
	{
		$this->form_validation->set_rules('nama_toko', 'Nama_toko', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('kota', 'Kota', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('alamat_toko', 'Alamat_toko', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('no_telepon', 'No_telepon', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));


		if ($this->form_validation->run() == false) {
			$data = array(
				'setting' => $this->m_setting->data_setting(),
			);
			$this->load->view('layout/header');
			$this->load->view('admin/navbar');
			$this->load->view('setting/content', $data, false);
			$this->load->view('layout/footer');
		} else {
			$data = array(
				'id' => 1,
				'lokasi' => $this->input->post('kota'),
				'nama_toko' => $this->input->post('nama_toko'),
				'alamat_toko' => $this->input->post('alamat_toko'),
				'no_telepon' => $this->input->post('no_telepon')
			);
			$this->m_setting->edit($data);
			$this->session->set_flashdata('pesan', 'Settingan Berhasil Di Ganti');
			redirect('admin/setting');
		}
	}
}
