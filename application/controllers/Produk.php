<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
            redirect('home_user');
        }
        // Jika role_id adalah 1 atau jenis lain yang diizinkan, biarkan pengguna melanjutkan

        $this->load->model('m_produk');
    }
    public function index()
    {
        $produk = $this->m_produk->getDataproduk();
        $queryproduk = $this->m_produk->getDataproduk1();
        $DATA = array('data_produk' => $produk, 'queryproduk' => $queryproduk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('produk/viewproduk', $DATA);
        $this->load->view('layout/footer');
    }
    public function Inputproduk()
    {
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');
        $id_kategori = $this->input->post('id_kategori');

        // Mengambil tanggal saat ini dan memformatnya menjadi "YYYY-MM-DD"
        $tanggal = date('Y-m-d');

        // Konfigurasi upload gambar
        $config['upload_path'] = './gambarproduk/'; // Direktori penyimpanan gambar
        $config['allowed_types'] = 'jpg|jpeg|png|webp'; // Format gambar yang diizinkan
        $config['max_size'] = 10000; // Ukuran maksimum gambar (dalam kilobita)
        $config['max_width'] = 10000; // Lebar maksimum gambar (dalam piksel)
        $config['max_height'] = 10000; // Tinggi maksimum gambar (dalam piksel)

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $data = $this->upload->data();
            $gambar_name = $data['file_name']; // Nama gambar yang berhasil diupload

            // Membuat nama baru untuk gambar dengan nama produk dan tanggal
            $nama_produk_baru = str_replace(' ', '_', $nama);
            $ext = pathinfo($gambar_name, PATHINFO_EXTENSION);
            $gambar_baru = $nama_produk_baru . '_' . $tanggal . '.' . $ext;

            // Rename gambar yang diunggah
            $old_path = $config['upload_path'] . $gambar_name;
            $new_path = $config['upload_path'] . $gambar_baru;
            rename($old_path, $new_path);

            $DataInsert = array(
                'nama' => $nama,
                'harga' => $harga,
                'gambar' => $gambar_baru, // Simpan nama file gambar baru dalam database
                'deskripsi' => $deskripsi,
                'id_kategori' => $id_kategori
            );

            if ($this->m_produk->InsertDataproduk($DataInsert)) {
                // Input berhasil
                $this->session->set_flashdata('success', 'Data produk berhasil ditambahkan.');
                redirect(base_url('produk/'));
            } else {
                // Input gagal
                $this->session->set_flashdata('error', 'Gagal menambahkan data produk.');
                redirect(base_url('produk/'));
            }
        } else {
            $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
            redirect(base_url('produk/'));
        }
    }



    public function update($id_produk)
    {
        $produk = $this->m_produk->getDataprodukDetail($id_produk);
        $DATA = array('data_produk' => $produk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('produk/editproduk', $DATA);
        $this->load->view('layout/footer');
    }

    public function updateproduk()
    {
        $id_produk = $this->input->post('id_produk');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');
        $id_kategori = $this->input->post('id_kategori');

        // Mengambil nama gambar lama dari database
        $produk_lama = $this->m_produk->getDataprodukDetail($id_produk);
        $gambar_lama = $produk_lama->gambar;

        // Konfigurasi upload gambar
        $config['upload_path'] = './gambarproduk/'; // Direktori penyimpanan gambar
        $config['allowed_types'] = 'jpg|jpeg|png|webp'; // Format gambar yang diizinkan
        $config['max_size'] = 10000; // Ukuran maksimum gambar (dalam kilobita)
        $config['max_width'] = 10000; // Lebar maksimum gambar (dalam piksel)
        $config['max_height'] = 10000; // Tinggi maksimum gambar (dalam piksel)

        // Mengambil nama file gambar yang diunggah
        $uploaded_file = $_FILES['gambar']['name'];

        // Membuat nama baru dengan nama input 'nama'
        $nama_baru = str_replace(' ', '_', $nama);

        // Menggabungkan nama baru dengan ekstensi dari file yang diunggah
        $gambar_baru = $nama_baru . '.' . pathinfo($uploaded_file, PATHINFO_EXTENSION);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $data = $this->upload->data();

            // Hapus gambar lama jika ada
            if (!empty($gambar_lama) && file_exists('./gambarproduk/' . $gambar_lama)) {
                unlink('./gambarproduk/' . $gambar_lama);
            }
        } else {
            $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
            redirect(base_url('produk/update/' . $id_produk));
        }

        $DataUpdate = array(
            'nama' => $nama,
            'harga' => $harga,
            'gambar' => $gambar_baru, // Simpan nama file gambar baru dalam database
            'deskripsi' => $deskripsi,
            'id_kategori' => $id_kategori
        );

        $this->m_produk->UpdateDataproduk($DataUpdate, $id_produk);
        redirect(base_url('produk/'));
    }



    public function delete($id_produk)
    {
        $this->m_produk->DeleteDataproduk($id_produk);
        redirect(base_url('produk/'));
    }
}
