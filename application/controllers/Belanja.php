<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
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
        $this->load->model('m_setting');
        $this->load->library('cart');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('homekeranjang/content');
        $this->load->view('home/footer');
    }


    public function add($produk_id)
    {
        // Cek apakah pengguna sudah login dengan role_id 2
        if ($this->session->userdata('role_id') == 2) {
            // Pengguna sudah login, lanjutkan dengan menambahkan produk ke keranjang

            // Ambil data produk dari database berdasarkan ID produk
            $produk = $this->m_setting->getProdukById($produk_id);

            if ($produk) {
                // Data produk ditemukan, lanjutkan dengan menambahkannya ke keranjang

                $data = array(
                    'id'      => $produk->id_produk,
                    'qty'     => 1,
                    'price'   => $produk->harga,
                    'name'    => $produk->nama,
                    'options' => array('gambar' => $produk->gambar) // Misalkan Anda memiliki kolom gambar di tabel produk
                );

                $this->cart->insert($data);

                // Setelah menambahkan produk ke keranjang, Anda bisa melakukan apa yang diperlukan, seperti menampilkan pesan sukses atau mengarahkan ke halaman lain
                // Contoh:
                redirect('home/detail/' . $produk_id);
            } else {
                // Produk tidak ditemukan, Anda bisa menangani ini dengan menampilkan pesan kesalahan atau mengarahkan ke halaman lain
                // Contoh:
                echo "Produk tidak ditemukan.";
            }
        } else {
            // Pengguna belum login dengan role_id 2, arahkan mereka ke halaman login_user
            redirect('login_user'); // Gantilah 'login_user' dengan URL sesuai dengan halaman login Anda
        }
    }


    public function get_total_items()
    {
        $total_items = $this->cart->total_items();
        echo json_encode($total_items);
    }

    public function update_cart()
    {
        // Ambil data yang diperlukan seperti rowid dan qty dari permintaan Ajax
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');

        // Gunakan keranjang belanja CodeIgniter untuk memperbarui keranjang
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
        $this->cart->update($data);

        // Kirim respons berupa pesan sukses
        echo "Keranjang diperbarui";
    }


    public function hapus($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }


    public function checkout()
    {
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('homecheckout/content');
        $this->load->view('home/footer');
    }
}
