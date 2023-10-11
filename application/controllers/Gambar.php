<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambar extends CI_Controller
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

        $this->load->model('M_gambarproduk');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('img_produk/viewproduk');
        $this->load->view('layout/footer');
    }

    public function input()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('img_produk/input_img');
        $this->load->view('layout/footer');
    }
    public function Inputgambarproduk()
    {
        $id_gambarproduk = $this->input->post('id_gambarproduk');
        $nama = $this->input->post('nama');

        $DataInsert = array(
            'id_gambarproduk' => $id_gambarproduk,
            'nama' => $nama,
        );

        if ($this->M_gambarproduk->InsertDatagambarproduk($DataInsert)) {
            // Input berhasil
            $this->session->set_flashdata('success', 'Data gambarproduk berhasil ditambahkan.');
            redirect(base_url('gambarproduk/'));
        } else {
            // Input gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data gambarproduk.');
            redirect(base_url('gambarproduk/'));
        }
    }

    public function update($id_gambarproduk)
    {
        $gambarproduk = $this->M_gambarproduk->getDatagambarprodukDetail($id_gambarproduk);
        $DATA = array('data_gambarproduk' => $gambarproduk);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('gambarproduk/editgambarproduk', $DATA);
        $this->load->view('layout/footer');
    }
    public function updategambarproduk()
    {
        $id_gambarproduk = $this->input->post('id_gambarproduk');
        $nama = $this->input->post('nama');



        $DataUpdate = array(
            'id_gambarproduk' => $id_gambarproduk,
            'nama' => $nama,

        );

        $this->M_gambarproduk->UpdateDatagambarproduk($DataUpdate, $id_gambarproduk);
        redirect(base_url('gambarproduk/'));
    }

    public function delete($id_gambarproduk)
    {
        $this->M_gambarproduk->DeleteDatagambarproduk($id_gambarproduk);
        redirect(base_url('gambarproduk/'));
    }
}
