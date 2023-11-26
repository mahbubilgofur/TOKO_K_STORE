<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
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

        if ($role_id == 2) {
            // Jika role_id adalah 2, arahkan ke halaman tertentu atau berikan pesan kesalahan
            redirect('home');
        }
        // Jika role_id adalah 1 atau jenis lain yang diizinkan, biarkan pengguna melanjutkan

        $this->load->model('m_kasir');
    }
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('kasir/kasirtransaksi');
        $this->load->view('layout/footer');
    }
    public function addkasir()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('kasir/addkasir');
        $this->load->view('layout/footer');
    }
    public function inputaddkasir()
    {
        $this->form_validation->set_rules('id_produk', 'ID PRODUK', 'required');
        $this->form_validation->set_rules('tgl', 'Gambar Terpilih', 'required');
        $this->form_validation->set_rules('total', 'Gambar Terpilih', 'required');
        $this->form_validation->set_rules('pembayaran', 'Gambar Terpilih', 'required');
        $this->form_validation->set_rules('kembalian', 'Gambar Terpilih', 'required');
    }
}
