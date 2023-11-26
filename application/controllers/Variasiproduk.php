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
        $this->load->model('M_variasiproduk');
        $data['data_variasiproduk'] = $this->M_variasiproduk->getDatavariasiproduk();
        $data['data_variasi'] = $this->M_variasiproduk->getDatavariasiproduk1();
        $data['data_produk'] = $this->M_variasiproduk->get_all_produk();

        // Validasi form
        $this->form_validation->set_rules('id_variasiproduk', 'ID VARIASI', 'required');
        $this->form_validation->set_rules('id_produk', 'ID PRODUK', 'required');
        for ($i = 1; $i <= 5; $i++) {
            $this->form_validation->set_rules("warna$i", "Warna $i", 'required');
            $this->form_validation->set_rules("harga$i", "Harga $i", 'required');
            $this->form_validation->set_rules("ukuran$i", "Ukuran $i", 'required');
            $this->form_validation->set_rules("stok$i", "Stok $i", 'required|numeric');
        }
        $this->form_validation->set_rules('gambar_terpilih', 'Gambar Terpilih', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('admin/navbar');
            $this->load->view('variasiproduk/viewvariasiproduk', $data);
            $this->load->view('layout/footer');
        } else {
            // Jika validasi berhasil, proses input ke database
            $id_produk = $this->input->post('id_produk');
            $gambar_terpilih = $this->input->post('gambar_terpilih');

            // Mendapatkan nama file gambar dari tbl_produk
            $gambar_produk = $this->getGambarProdukById($id_produk, $gambar_terpilih);

            // Menyimpan gambar di folder ./gambarvariasi/
            $gambar_variasi = $this->saveGambarVariasi($gambar_produk);

            // Data untuk disimpan ke dalam tabel variasi_produk
            $data_variasi = array();

            // Ambil ID variasi terakhir dari model
            $last_id_variasi = $this->M_variasiproduk->get_last_variasi_id();

            for ($i = 1; $i <= 5; $i++) {
                $warna = $this->input->post("warna$i");
                $harga = $this->input->post("harga$i");
                $ukuran = strtoupper($this->input->post("ukuran$i")); // Mengubah ukuran menjadi huruf kapital
                $stok = $this->input->post("stok$i");

                // Membuat ID variasi baru dengan nomor yang diincrement
                $new_number = intval(substr($last_id_variasi, 3)) + $i;
                $new_id_variasi = 'VAR' . str_pad($new_number, 5, '0', STR_PAD_LEFT);

                $data_variasi[] = array(
                    'id_variasiproduk' => $new_id_variasi,
                    'id_produk' => $id_produk,
                    'warna' => ucfirst(strtolower($warna)),
                    'harga' => $harga,
                    'ukuran' => $ukuran,
                    'stok' => $stok,
                    'gambar' => $gambar_variasi,
                );
            }

            // Simpan informasi variasi_produk ke database
            $this->M_variasiproduk->update_variasi_produk($data_variasi);

            // Redirect dengan pesan sukses
            $this->session->set_flashdata('success', 'Data variasi_produk berhasil disimpan');
            redirect('variasiproduk');
        }
    }
    // Menambahkan metode untuk menyimpan gambar ke folder variasi
    private function saveGambarVariasi($gambar_produk)
    {
        $source_path = './gambarproduk/' . $gambar_produk;
        $destination_path = './gambarvariasi/';

        $extension = pathinfo($gambar_produk, PATHINFO_EXTENSION);
        $new_filename = uniqid() . '_gambar_produk.' . $extension;

        if (copy($source_path, $destination_path . $new_filename)) {
            return $new_filename;
        } else {
            log_message('error', 'Gagal menyimpan gambar ke folder variasi');
            return 'default.jpg';
        }
    }



    // Menambahkan metode untuk mendapatkan nama gambar produk berdasarkan ID
    private function getGambarProdukById($id_produk, $gambar_terpilih)
    {
        return $this->M_variasiproduk->getGambarProdukById($id_produk, $gambar_terpilih);
    }
    // Callback fungsi validasi untuk upload gambar

    public function update($id_variasiproduk)
    {
        $data['variasi'] = $this->M_variasiproduk->get_variasi_by_id($id_variasiproduk);
        $data['data_variasi'] = $this->M_variasiproduk->getDatavariasiproduk1();
        $data['data_produk'] = $this->M_variasiproduk->get_all_produk();
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('variasiproduk/editvariasiproduk', $data);
        $this->load->view('layout/footer');
    }
    public function editvariasi()
    {
        // Fetch data for dropdowns or other purposes
        $data['data_variasi'] = $this->M_variasiproduk->get_all_produk();
        $data['data_produk'] = $this->M_variasiproduk->get_all_produk();

        // Validasi form
        $this->form_validation->set_rules('id_variasiproduk', 'ID VARIASI', 'required');
        $this->form_validation->set_rules('id_produk', 'ID PRODUK', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('selected_gambar', 'Gambar Terpilih', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, set flashdata untuk pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('variasiproduk');
        } else {
            // Jika validasi berhasil, proses edit di database
            $id_produk = $this->input->post('id_produk');
            $gambar_terpilih = $this->input->post('selected_gambar');
            $id_variasiproduk = $this->input->post('id_variasiproduk');

            // Mendapatkan nama file gambar dari tabel produk
            $gambar_produk = $this->getGambarProdukById1($id_produk, $gambar_terpilih);

            if (!$gambar_produk) {
                // Handle the case where the selected_gambar is not found
                $this->session->set_flashdata('error', 'Gambar Terpilih tidak ditemukan');
                redirect('variasiproduk');
            }

            // Menyimpan gambar di folder ./gambarvariasi/
            $gambar_variasi = $this->saveGambarVariasi1($gambar_produk);

            // Data untuk disimpan ke dalam tabel variasi_produk
            $data_variasi = array(
                'id_variasiproduk' => $id_variasiproduk,
                'id_produk' => $id_produk,
                'warna' => $this->input->post('warna'),
                'ukuran' => strtoupper($this->input->post('ukuran')),
                'stok' => $this->input->post('stok'),
                'gambar' => $gambar_variasi,
            );

            // Update informasi variasi_produk ke database
            $this->M_variasiproduk->update_variasi_produk($data_variasi);

            // Set flashdata untuk pesan sukses
            $this->session->set_flashdata('success', 'Data variasi_produk berhasil diperbarui');
            redirect('variasiproduk');
        }
    }


    private function getGambarProdukById1($id_produk, $gambar_terpilih)
    {
        // Query untuk mendapatkan nama file gambar dari tabel produk
        $this->db->select($gambar_terpilih);
        $this->db->from('tbl_produk');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row()->{$gambar_terpilih};
    }


    public function uploadGambarBaru()
    {
        $config['upload_path']   = './gambarvariasi/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_baru')) {
            $data = $this->upload->data();
            return $data['file_name'];
        } else {
            return false;
        }
    }
    private function saveGambarVariasi1($gambar_produk)
    {
        // Jika ada gambar yang diunggah, simpan gambar baru dan hapus gambar lama
        if (!empty($_FILES['gambar_baru']['name'])) {
            // Unggah gambar baru
            $gambar_baru = $this->uploadGambarBaru();

            // Hapus gambar lama
            $this->hapusGambarLama($gambar_produk);

            return $gambar_baru;
        } else {
            // Jika tidak ada gambar yang diunggah, gunakan gambar lama
            return $gambar_produk;
        }
    }

    public function hapusGambarLama($gambar)
    {
        $path = './gambarvariasi/' . $gambar;
        if (file_exists($path)) {
            unlink($path);
        }
    }



    public function delete($id_variasiproduk)
    {
        $this->M_variasiproduk->DeleteDatavariasiproduk($id_variasiproduk);

        redirect(base_url('variasiproduk/'));
    }
}
