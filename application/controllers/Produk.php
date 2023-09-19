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
        $this->load->model('m_kategori');
    }
    public function index()
    {

        $produk = $this->m_produk->getDataproduk();
        $queryproduk = $this->m_produk->getDataproduk1();
        $getKategori = $this->m_produk->getKategori();
        $getVariasi = $this->m_produk->getVariasi();
        $DATA = array('data_produk' => $produk, 'queryproduk' => $queryproduk, 'getketegori' => $getKategori, 'getvariasi' => $getVariasi);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('produk/viewproduk', $DATA);
        $this->load->view('layout/footer');
    }

    public function Inputproduk()
    {
        $this->load->library('form_validation');

        // Aturan validasi untuk field input
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[35]');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('id_variasiproduk', 'ID Variasi Produk', 'trim|required|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, arahkan kembali ke halaman produk dengan pesan kesalahan
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('produk/'));
        } else {
            $id_produk = $this->input->post('id_produk');
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $id_kategori = $this->input->post('id_kategori');
            $id_variasiproduk = $this->input->post('id_variasiproduk');

            $tanggal = date('Y-m-d');

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
                    'id_produk' => $id_produk,
                    'nama' => $nama,
                    'harga' => $harga,
                    'gambar' => $gambar_baru, // Simpan nama file gambar baru dalam database
                    'deskripsi' => $deskripsi,
                    'id_kategori' => $id_kategori,
                    'id_variasiproduk' => $id_variasiproduk
                );

                // Simpan data ke dalam database (sesuaikan dengan model Anda)
                $this->m_produk->InsertDataproduk($DataInsert); // Gantilah "nama_model" dengan nama model yang sesuai

                // Hapus data sesi "flashdata"
                $this->session->unset_userdata('nama');
                $this->session->unset_userdata('harga');
                $this->session->unset_userdata('deskripsi');
                $this->session->unset_userdata('id_kategori');
                $this->session->unset_userdata('id_variasiproduk');

                // Redirect ke halaman yang sesuai setelah berhasil menyimpan
                redirect(base_url('produk/'));
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
                redirect(base_url('produk/'));
            }
        }
    }



    public function update($id_produk)
    {
        $queryproduk = $this->m_produk->getDataproduk1();
        $getKategori = $this->m_produk->getKategori();
        $getVariasi = $this->m_produk->getVariasi();
        $produk = $this->m_produk->getDataprodukDetail($id_produk);
        $DATA = array('data_produk' => $produk, 'queryproduk' => $queryproduk, 'getketegori' => $getKategori, 'getvariasi' => $getVariasi);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('produk/editproduk', $DATA);
        $this->load->view('layout/footer');
    }



    public function updateproduk()
    {
        $this->load->library('form_validation');

        // Aturan validasi untuk field input
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[35]');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('id_variasiproduk', 'ID Variasi Produk', 'trim|required|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, arahkan kembali ke halaman produk dengan pesan kesalahan
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('produk/'));
        } else {
            $id_produk = $this->input->post('id_produk');
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $id_kategori = $this->input->post('id_kategori');
            $id_variasiproduk = $this->input->post('id_variasiproduk');

            $tanggal = date('Y-m-d');

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

                $DataUpdate = array(
                    'nama' => $nama,
                    'harga' => $harga,
                    'gambar' => $gambar_baru, // Simpan nama file gambar baru dalam database
                    'deskripsi' => $deskripsi,
                    'id_kategori' => $id_kategori,
                    'id_variasiproduk' => $id_variasiproduk
                );

                // Simpan data ke dalam database (sesuaikan dengan model Anda)
                $this->m_produk->UpdateDataproduk($id_produk, $DataUpdate); // Gantilah "nama_model" dengan nama model yang sesuai

                // Hapus data sesi "flashdata"
                $this->session->unset_userdata('nama');
                $this->session->unset_userdata('harga');
                $this->session->unset_userdata('deskripsi');
                $this->session->unset_userdata('id_kategori');
                $this->session->unset_userdata('id_variasiproduk');

                // Redirect ke halaman yang sesuai setelah berhasil menyimpan
                redirect(base_url('produk/'));
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
                redirect(base_url('produk/'));
            }
        }
    }






    public function delete($id_produk)
    {
        $this->m_produk->DeleteDataproduk($id_produk);
        redirect(base_url('produk/'));
    }
}









 // public function Inputproduk()
    // {
    //     $id_produk = $this->input->post('id_produk');
    //     $nama = $this->input->post('nama');
    //     $harga = $this->input->post('harga');
    //     $deskripsi = $this->input->post('deskripsi');
    //     $id_kategori = $this->input->post('id_kategori');
    //     $id_variasiproduk = $this->input->post('id_variasiproduk');

    //     // Mengambil tanggal saat ini dan memformatnya menjadi "YYYY-MM-DD"
    //     $tanggal = date('Y-m-d');

    //     // Konfigurasi upload gambar
    //     $config['upload_path'] = './gambarproduk/'; // Direktori penyimpanan gambar
    //     $config['allowed_types'] = 'jpg|jpeg|png|webp'; // Format gambar yang diizinkan
    //     $config['max_size'] = 10000; // Ukuran maksimum gambar (dalam kilobita)
    //     $config['max_width'] = 10000; // Lebar maksimum gambar (dalam piksel)
    //     $config['max_height'] = 10000; // Tinggi maksimum gambar (dalam piksel)

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('gambar')) {
    //         $data = $this->upload->data();
    //         $gambar_name = $data['file_name']; // Nama gambar yang berhasil diupload

    //         // Membuat nama baru untuk gambar dengan nama produk dan tanggal
    //         $nama_produk_baru = str_replace(' ', '_', $nama);
    //         $ext = pathinfo($gambar_name, PATHINFO_EXTENSION);
    //         $gambar_baru = $nama_produk_baru . '_' . $tanggal . '.' . $ext;

    //         // Rename gambar yang diunggah
    //         $old_path = $config['upload_path'] . $gambar_name;
    //         $new_path = $config['upload_path'] . $gambar_baru;
    //         rename($old_path, $new_path);

    //         $DataInsert = array(
    //             'id_produk' => $id_produk,
    //             'nama' => $nama,
    //             'harga' => $harga,
    //             'gambar' => $gambar_baru, // Simpan nama file gambar baru dalam database
    //             'deskripsi' => $deskripsi,
    //             'id_kategori' => $id_kategori,
    //             'id_variasiproduk' => $id_variasiproduk
    //         );

    //         if ($this->m_produk->InsertDataproduk($DataInsert)) {
    //             // Input berhasil
    //             $this->session->set_flashdata('success', 'Data produk berhasil ditambahkan.');
    //             redirect(base_url('produk/'));
    //         } else {
    //             // Input gagal
    //             $this->session->set_flashdata('error', 'Gagal menambahkan data produk.');
    //             redirect(base_url('produk/'));
    //         }
    //     } else {
    //         $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
    //         redirect(base_url('produk/'));
    //     }
    // }
