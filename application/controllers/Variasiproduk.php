<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Variasiproduk extends CI_Controller
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

        $this->load->model('M_variasiproduk');
    }
    public function index()
    {
        $variasiproduk = $this->M_variasiproduk->getDatavariasiproduk();
        $data_produk = $this->M_variasiproduk->data_produk();
        $variasi = $this->M_variasiproduk->getDatavariasiproduk1();
        $DATA = array('data_variasiproduk' => $variasiproduk, 'data_variasi' => $variasi, 'data_produk' => $data_produk);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('variasiproduk/viewvariasiproduk', $DATA);
        $this->load->view('layout/footer');
    }


    public function input_variasi()
    {
        // Load model
        $this->load->model('M_variasiproduk');
        $data['data_variasiproduk'] = $this->M_variasiproduk->getDatavariasiproduk();
        // Data untuk ditampilkan di view
        $data['data_variasi'] = $this->M_variasiproduk->getDatavariasiproduk1();
        $data['data_produk'] = $this->M_variasiproduk->get_all_produk();

        // Validasi form
        $this->form_validation->set_rules('id_variasiproduk', 'ID VARIASI', 'required');
        $this->form_validation->set_rules('id_produk', 'ID PRODUK', 'required');
        $this->form_validation->set_rules('warna', 'WARNA', 'required');
        $this->form_validation->set_rules('ukuran', 'UKURAN', 'required');
        $this->form_validation->set_rules('stok', 'STOK', 'required|numeric');
        $this->form_validation->set_rules('gambar_terpilih', 'Gambar Terpilih', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('admin/navbar');
            $this->load->view('variasiproduk/viewvariasiproduk', $data);
            $this->load->view('layout/footer');
        } else {
            // Jika validasi berhasil, proses input ke database
            $id_variasiproduk = $this->input->post('id_variasiproduk');
            $id_produk = $this->input->post('id_produk');
            $warna = $this->input->post('warna');
            $ukuran = $this->input->post('ukuran');
            $stok = $this->input->post('stok');
            $gambar_terpilih = $this->input->post('gambar_terpilih');

            // Data untuk disimpan ke dalam tabel variasi_produk
            $data_variasi = array(
                'id_variasiproduk' => $id_variasiproduk,
                'id_produk' => $id_produk,
                'warna' => $warna,
                'ukuran' => $ukuran,
                'stok' => $stok,
                'gambar' => $gambar_terpilih
            );

            // Simpan informasi variasi_produk ke database
            $this->M_variasiproduk->insert_variasi_produk($data_variasi);

            // Redirect dengan pesan sukses
            $this->session->set_flashdata('success', 'Data variasi_produk berhasil disimpan');
            redirect('variasiproduk');
        }
    }

    // public function input_variasi()
    // {
    //     // Load model
    //     $this->load->model('M_variasiproduk');
    //     $data['data_variasiproduk'] = $this->M_variasiproduk->getDatavariasiproduk();
    //     // Data untuk ditampilkan di view
    //     $data['data_variasi'] = $this->M_variasiproduk->getDatavariasiproduk1();
    //     $data['data_produk'] = $this->M_variasiproduk->get_all_produk();

    //     // Validasi form
    //     $this->form_validation->set_rules('id_variasiproduk', 'ID VARIASI', 'required');
    //     $this->form_validation->set_rules('id_produk', 'ID PRODUK', 'required');
    //     $this->form_validation->set_rules('warna', 'WARNA', 'required');
    //     $this->form_validation->set_rules('ukuran', 'UKURAN', 'required');
    //     $this->form_validation->set_rules('stok', 'STOK', 'required|numeric');

    //     // Check if a product is selected before validating file upload
    //     $is_product_selected = !empty($this->input->post('id_produk'));
    //     if ($is_product_selected) {
    //         $this->form_validation->set_rules('gambar', 'Gambar', 'required');
    //     }

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->session->set_flashdata('error', 'error');
    //         redirect('variasiproduk');
    //     } else {
    //         // Jika validasi berhasil, proses input ke database
    //         $id_variasiproduk = $this->input->post('id_variasiproduk');
    //         $id_produk = $this->input->post('id_produk');
    //         $warna = $this->input->post('warna');
    //         $ukuran = $this->input->post('ukuran');
    //         $stok = $this->input->post('stok');
    //         $nama_gambar_terpilih = $this->input->post('nama_gambar_terpilih');

    //         // Data untuk disimpan ke dalam tabel variasi_produk
    //         $data_variasi = array(
    //             'id_variasiproduk' => $id_variasiproduk,
    //             'id_produk' => $id_produk,
    //             'warna' => $warna,
    //             'ukuran' => $ukuran,
    //             'stok' => $stok,
    //             'gambar' => $nama_gambar_terpilih
    //         );

    //         // Simpan informasi variasi_produk ke database
    //         $this->M_variasiproduk->insert_variasi_produk($data_variasi);

    //         // Simpan gambar ke direktori if a product is selected
    //         if ($is_product_selected) {
    //             $config['upload_path'] = './gambarvariasi/';
    //             $config['allowed_types'] = 'jpg|jpeg|png';
    //             $config['max_size'] = 2048; // 2MB
    //             $config['max_width'] = 2000;
    //             $config['max_height'] = 2000;

    //             $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('gambar')) {
    //                 // Jika upload gambar berhasil, simpan nama gambar ke database
    //                 $data_upload = $this->upload->data();
    //                 $gambar_baru = $data_upload['file_name'];

    //                 // Update nama gambar pada record variasi_produk
    //                 $this->M_variasiproduk->update_gambar_variasi($id_variasiproduk, $gambar_baru);
    //             } else {
    //                 // Jika upload gambar gagal, tampilkan pesan error
    //                 $error = array('error' => $this->upload->display_errors());
    //                 $this->session->set_flashdata('error', $error['error']);
    //                 redirect('variasiproduk');
    //             }
    //         }

    //         // Redirect dengan pesan sukses
    //         $this->session->set_flashdata('success', 'Data variasi_produk berhasil disimpan');
    //         redirect('variasiproduk');
    //     }
    // }

    // Callback fungsi validasi untuk upload gambar
    public function upload_image($gambar)
    {
        $config['upload_path']          = './gambarvariasi/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 2048; // 2MB
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->form_validation->set_message('upload_image', $this->upload->display_errors());
            return FALSE;
        } else {
            $data = $this->upload->data();
            return $data['file_name']; // Mengembalikan nama file yang diupload
        }
    }


    public function update($id_variasiproduk)
    {
        $variasiproduk = $this->M_variasiproduk->getDatavariasiprodukDetail($id_variasiproduk);
        $DATA = array('data_variasiproduk' => $variasiproduk);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('variasiproduk/editvariasiproduk', $DATA);
        $this->load->view('layout/footer');
    }
    public function Editvariasiproduk($id_variasiproduk)
    {
        // Konfigurasi upload gambar
        $config['upload_path'] = './gambarvariasi/'; // Direktori penyimpanan gambar
        $config['allowed_types'] = 'jpg|jpeg|png|webp'; // Format gambar yang diizinkan
        $config['max_size'] = 10000; // Ukuran maksimum gambar (dalam kilobita)
        $config['max_width'] = 10000; // Lebar maksimum gambar (dalam piksel)
        $config['max_height'] = 10000; // Tinggi maksimum gambar (dalam piksel)

        $this->load->library('upload', $config);

        // Mengecek apakah file gambar diupload
        if ($this->upload->do_upload('gambar')) {
            // Gambar berhasil diupload
            $upload_data = $this->upload->data();

            // Menerima data dari permintaan POST
            $id_produk = $this->input->post('id_produk');
            $warna = $this->input->post('warna');
            $ukuran = $this->input->post('ukuran');
            $gambar = $upload_data['file_name']; // Nama file gambar yang diupload
            $stok = $this->input->post('stok');

            $data = array(
                'id_produk' => $id_produk,
                'warna' => $warna,
                'ukuran' => $ukuran,
                'gambar' => $gambar,
                'stok' => $stok
            );

            // Memanggil fungsi edit pada model Anda dengan $data dan $id_variasi
            if ($this->m_variasiproduk->UpdateDatavariasiproduk($data, $id_variasiproduk)) {
                // Edit berhasil
                $this->session->set_flashdata('success', 'Data gambarproduk berhasil diedit.');
                redirect(base_url('gambarproduk/'));
            } else {
                // Edit gagal
                $this->session->set_flashdata('error', 'Gagal mengedit data gambarproduk.');
                redirect(base_url('gambarproduk/'));
            }
        } else {
            // Gambar gagal diupload, tampilkan pesan kesalahan
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect(base_url('gambarproduk/'));
        }
    }


    public function delete($id_variasiproduk)
    {
        $this->M_variasiproduk->DeleteDatavariasiproduk($id_variasiproduk);

        redirect(base_url('variasiproduk/'));
    }
}
