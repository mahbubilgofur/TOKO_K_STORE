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
		shuffle($produk);
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

		// Check ketersediaan variasi produk
		if ($data['stok'] > 0 && $data['harga'] > 0) {
			// Jika variasi produk tersedia, kirim stok dan harga
			$response = array(
				'variasi_tersedia' => true,
				'stok' => $data['stok'],
				'harga' => $data['harga']
			);
		} else {
			// Jika variasi produk tidak tersedia
			$response = array(
				'variasi_tersedia' => false
			);
		}

		// Mengirimkan data dalam format JSON
		echo json_encode($response);
	}
	public function profil()
	{
		// Ambil ID pengguna dari sesi atau logika lainnya.
		// Ini hanyalah contoh, Anda perlu menyesuaikan dengan cara Anda sendiri untuk mendapatkan ID.
		$id = $this->session->userdata('id');

		if (!$id) {
			// Jika ID tidak ditemukan atau sesi tidak ada, Anda mungkin ingin menampilkan pesan kesalahan atau mengarahkan ke halaman lain.
			redirect(base_url('home')); // Arahkan ke halaman beranda atau halaman lain jika tidak ada ID
		}

		$user = $this->m_user->getDatauserDetail($id);

		if (!$user) {
			// Jika data user tidak ditemukan berdasarkan ID yang diberikan, Anda bisa menampilkan pesan kesalahan atau mengarahkan ke halaman lain.
			redirect(base_url('home')); // Arahkan ke halaman beranda jika data user tidak ditemukan
		}

		$DATA = array('data_user' => $user);
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('profil/content', $DATA);
		// $this->load->view('home/footer');
	}
	// public function updateuser1()
	// {
	// 	// Memuat library form validation
	// 	$this->load->library('form_validation');

	// 	// Set aturan validasi untuk input
	// 	$this->form_validation->set_rules('id', 'ID', 'required|integer');
	// 	$this->form_validation->set_rules('nama', 'Nama', 'required');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

	// 	// Melakukan validasi form
	// 	if ($this->form_validation->run() == FALSE) {
	// 		// Jika validasi form gagal, tampilkan pesan kesalahan
	// 		$this->session->set_flashdata('error', validation_errors());
	// 		redirect(base_url('home/profil/' . $this->input->post('id')));
	// 		return;
	// 	}

	// 	$id = $this->input->post('id');
	// 	$nama = $this->input->post('nama');
	// 	$email = $this->input->post('email');

	// 	// Validasi gambar yang diunggah
	// 	if ($_FILES['gambar']['name']) {
	// 		$config['upload_path'] = './gambar_user/';
	// 		$config['allowed_types'] = 'jpg|jpeg|png';
	// 		$config['max_size'] = 1024;  // Maksimal 1 MB

	// 		$this->load->library('upload', $config);

	// 		if (!$this->upload->do_upload('gambar')) {
	// 			// Jika validasi gagal, tampilkan pesan kesalahan
	// 			$error = $this->upload->display_errors();
	// 			$this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $error);
	// 			redirect(base_url('home/profil/' . $id));
	// 			return;
	// 		} else {
	// 			// Jika validasi berhasil, lanjutkan dengan update data pengguna
	// 			$data = $this->upload->data();
	// 			$gambar = 'user_' . $id . '.jpg'; // Nama gambar baru sesuai dengan ID pengguna

	// 			// Hapus gambar lama jika ada
	// 			$old_image_path = './gambar_user/user_' . $id . '.jpg';
	// 			if (file_exists($old_image_path)) {
	// 				unlink($old_image_path);
	// 			}

	// 			// Update data pengguna dengan gambar baru
	// 			$DataUpdate = array(
	// 				'nama' => $nama,
	// 				'email' => $email,
	// 				'gambar' => $gambar
	// 			);

	// 			$this->m_user->UpdateDatauser($DataUpdate, $id);
	// 			$this->session->set_userdata('nama', $nama);
	// 			$this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
	// 			redirect(base_url('home/profil/' . $id));
	// 		}
	// 	} else {
	// 		// Jika gambar tidak diunggah, lanjutkan dengan update data pengguna tanpa mengubah gambar
	// 		$DataUpdate = array(
	// 			'nama' => $nama,
	// 			'email' => $email
	// 		);

	// 		$this->m_user->UpdateDatauser($DataUpdate, $id);
	// 		$this->session->set_userdata('nama', $nama);
	// 		$this->session->set_flashdata('success', 'Profil berhasil diperbarui tanpa mengubah gambar!');
	// 		redirect(base_url('home/profil/' . $id));
	// 	}
	// }
	public function updateuser1()
{
    $this->load->library('form_validation');

    // Validasi form
    $this->form_validation->set_rules('id', 'ID', 'required|integer');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect(base_url('home/profil/' . $this->input->post('id')));
        return;
    }

    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');

    $config['upload_path'] = './gambar_user/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size'] = 1024;

    $this->load->library('upload', $config);

    // Cek apakah ada file yang diunggah
    if (!empty($_FILES['gambar']['name'])) {
        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();

            // Hapus gambar lama jika ada
            $old_image_path = FCPATH . 'gambar_user/' . $this->input->post('old_gambar');
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }

            $gambar = $upload_data['file_name'];

            $DataUpdate = array(
                'nama' => $nama,
                'email' => $email,
                'gambar' => $gambar
            );
        } else {
            $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
            redirect(base_url('home/profil/' . $id));
            return;
        }
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $DataUpdate = array(
            'nama' => $nama,
            'email' => $email
        );
    }

    $this->m_user->UpdateDatauser($DataUpdate, $id);
    $this->session->set_userdata('nama', $nama);
    $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
    redirect(base_url('home/profil/' . $id));
}

	// public function updateuser1()
	// {
	// 	// Memuat library form validation
	// 	$this->load->library('form_validation');

	// 	// Set aturan validasi untuk input
	// 	$this->form_validation->set_rules('id', 'ID', 'required|integer');
	// 	$this->form_validation->set_rules('nama', 'Nama', 'required');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

	// 	// Melakukan validasi form
	// 	if ($this->form_validation->run() == FALSE) {
	// 		// Jika validasi form gagal, tampilkan pesan kesalahan
	// 		$this->session->set_flashdata('error', validation_errors());
	// 		redirect(base_url('home/profil/' . $this->input->post('id')));
	// 		return;
	// 	}

	// 	$id = $this->input->post('id');
	// 	$nama = $this->input->post('nama');
	// 	$email = $this->input->post('email');

	// 	// Validasi gambar yang diunggah
	// 	if ($_FILES['gambar']['name']) {
	// 		$config['upload_path'] = './gambar_user/';
	// 		$config['allowed_types'] = 'jpg|jpeg|png';
	// 		$config['max_size'] = 1024;  // Maksimal 1 MB

	// 		$this->load->library('upload', $config);

	// 		if (!$this->upload->do_upload('gambar')) {
	// 			// Jika validasi gagal, tampilkan pesan kesalahan
	// 			$error = $this->upload->display_errors();
	// 			$this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $error);
	// 			redirect(base_url('home/profil/' . $id));
	// 			return;
	// 		} else {
	// 			// Hapus gambar lama jika ada
	// 			$old_image_path = './gambar_user/user_' . $id . '.*'; // Menggunakan wildcard (*) untuk mendapatkan semua format gambar
	// 			foreach (glob($old_image_path) as $old_file) {
	// 				if (is_file($old_file)) {
	// 					unlink($old_file);  // Hapus file gambar lama
	// 				}
	// 			}

	// 			// Jika validasi berhasil, lanjutkan dengan update data pengguna
	// 			$data = $this->upload->data();
	// 			$ext = $data['file_ext'];  // Mendapatkan ekstensi file yang diunggah, seperti .jpg, .jpeg, atau .png
	// 			$gambar = 'user_' . $id . $ext;  // Menetapkan nama gambar baru dengan ekstensi yang sesuai

	// 			// Update data pengguna dengan gambar baru
	// 			$DataUpdate = array(
	// 				'nama' => $nama,
	// 				'email' => $email,
	// 				'gambar' => $gambar
	// 			);

	// 			$this->m_user->UpdateDatauser($DataUpdate, $id);
	// 			$this->session->set_userdata('nama', $nama);
	// 			$this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
	// 			redirect(base_url('home/profil/' . $id));
	// 		}
	// 	} else {
	// 		// Jika gambar tidak diunggah, lanjutkan dengan update data pengguna tanpa mengubah gambar
	// 		$DataUpdate = array(
	// 			'nama' => $nama,
	// 			'email' => $email
	// 		);

	// 		$this->m_user->UpdateDatauser($DataUpdate, $id);
	// 		$this->session->set_userdata('nama', $nama);
	// 		$this->session->set_flashdata('success', 'Profil berhasil diperbarui tanpa mengubah gambar!');
	// 		redirect(base_url('home/profil/' . $id));
	// 	}
	// }
}
