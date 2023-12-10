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
		// Jika role_id adalah 1 atau jenis lain yang diizinkan, biarkan pengguna melanjutkan
		$this->load->model('m_produk');
		$this->load->model('m_variasiproduk');
		$this->load->model('m_setting');
		$this->load->model('m_user');
		$this->load->model('m_kategori');
		$this->load->model('m_pencarian');
	}
	public function index()
	{
		$produk = $this->m_produk->getDataproduk();
		$queryproduk = $this->m_produk->getDataproduk1();
		$getKategori = $this->m_produk->getKategori();
		$getKategori1 = $this->m_produk->getcariKategori();
		$getuser = $this->m_produk->getuser();

		// Inisialisasi array untuk menyimpan detail produk dalam keranjang
		$data['produk_keranjang'] = array();

		// Ambil data keranjang
		$this->load->library('session');
		$keranjang_belanja = $this->session->userdata('keranjang_belanja');

		// Periksa apakah $keranjang_belanja adalah array sebelum melakukan perulangan
		if (is_array($keranjang_belanja)) {
			// Loop melalui ID produk dalam keranjang dan ambil detail produk
			foreach ($keranjang_belanja as $id_produk) {
				// Dapatkan data produk berdasarkan ID produk
				$produk_detail = $this->m_produk->getProdukById($id_produk);

				// Jika produk ditemukan, tambahkan ke array detail produk
				if ($produk_detail) {
					$data['produk_keranjang'][] = $produk_detail;
				}
			}
		}
		$DATA = array(
			'data_produk' => $produk,
			'queryproduk' => $queryproduk,
			'getketegori' => $getKategori,
			'getcariketegori' => $getKategori1,
			'getuser' => $getuser,
			'produk_keranjang' => $data['produk_keranjang'], // Data keranjang
		);

		$this->load->view('home/header');
		$this->load->view('home/navbar', $DATA);
		$this->load->view('home/content', $DATA);
		$this->load->view('home/footer');
	}

	public function search()
	{
		$keyword = $this->input->get('keyword');

		// Memecah kata kunci pencarian menjadi array
		$keywords = explode(' ', $keyword);

		// Panggil metode cari_produk dari model
		$data['produk'] = $this->m_pencarian->cari_produk($keywords);

		$this->load->view('home/header');
		$this->load->view('home/navbar', $data);
		$this->load->view('homekategori/content', $data);
		$this->load->view('home/footer');
	}

	public function homekategori($id_kategori)
	{
		$this->load->model('m_produk'); // Load model m_produk
		$data['produk'] = $this->m_produk->get_produk_by_kategori_hierarki($id_kategori);

		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('homekategori/content', $data);
		$this->load->view('home/footer');
	}


	public function detail($id_produk)
	{
		// Mengambil data produk berdasarkan $id_produk dari model Anda
		$this->load->model('m_setting');
		$this->load->model('m_produk'); // Ganti 'm_produk' dengan nama model Anda
		$data['variasi_produk'] = $this->m_variasiproduk->get_variasi_produk_by_id_produk($id_produk);
		$data['unique_colors'] = $this->m_setting->getUniqueColors($id_produk);
		$data['unique_sizes'] = $this->m_setting->getUniqueSizes($id_produk);
		$data['produk'] = $this->m_produk->getProdukById($id_produk);
		$produk = $this->m_produk->getDataproduk();
		$queryproduk = $this->m_produk->getDataproduk1();
		$getKategori = $this->m_produk->getKategori();

		// Inisialisasi array untuk menyimpan detail produk dalam keranjang
		$data['produk_keranjang'] = array();

		// Ambil data keranjang
		$this->load->library('session');
		$keranjang_belanja = $this->session->userdata('keranjang_belanja');

		// Periksa apakah $keranjang_belanja adalah array sebelum melakukan perulangan
		if (is_array($keranjang_belanja)) {
			// Loop melalui ID produk dalam keranjang dan ambil detail produk
			foreach ($keranjang_belanja as $id_produk) {
				// Dapatkan data produk berdasarkan ID produk
				$produk_detail = $this->m_produk->getProdukById($id_produk);

				// Jika produk ditemukan, tambahkan ke array detail produk
				if ($produk_detail) {
					$data['produk_keranjang'][] = $produk_detail;
				}
			}
		}

		$DATA = array(
			'data_produk' => $produk,
			'queryproduk' => $queryproduk,
			'getketegori' => $getKategori,
			'produk_keranjang' => $data['produk_keranjang'], // Data keranjang
		);
		if ($data['produk']) {
			$this->load->view('home/header');
			$this->load->view('home/navbar', $DATA);
			$this->load->view('homedetail/content_detail', $data); // Mengirim data produk ke view
			$this->load->view('homedetail/footer');
		} else {
			// Handle jika produk tidak ditemukan
			show_404(); // Menampilkan halaman 404 Not Found
		}
	}
	public function get_stok_harga()
	{
		$id_produk = $this->input->post('id_produk');
		$warna = $this->input->post('warna');
		$ukuran = $this->input->post('ukuran');

		// Panggil model untuk mendapatkan stok dan harga
		$data = $this->m_variasiproduk->getStokHarga($id_produk, $warna, $ukuran);

		// Mengirimkan data dalam format JSON
		echo json_encode($data);
	}
}
