<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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

        $this->load->model('M_kategori');
    }

    public function index()
    {
        $querykategori = $this->M_kategori->getdatakategori1();
        $kategori = $this->M_kategori->getDatakategori();
        $DATA = array('data_kategori' => $kategori, 'querykategori' => $querykategori);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('kategori/viewkategori', $DATA);
        $this->load->view('layout/footer');
    }
    public function Inputkategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $induk_id = $this->input->post('induk_id');


        $DataInsert = array(
            'id_kategori' => $id_kategori,
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'induk_id' => $induk_id

        );

        if ($this->M_kategori->InsertDatakategori($DataInsert)) {
            // Input berhasil
            $this->session->set_flashdata('success', 'Data kategori berhasil ditambahkan.');
            redirect(base_url('kategori/'));
        } else {
            // Input gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data kategori.');
            redirect(base_url('kategori/'));
        }
    }

    public function update($id_kategori)
    {
        $kategori = $this->M_kategori->getDatakategoriDetail($id_kategori);
        $DATA = array('data_kategori' => $kategori);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('kategori/editkategori', $DATA);
        $this->load->view('layout/footer');
    }
    public function updatekategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $induk_id = $this->input->post('induk_id');


        $DataUpdate = array(
            'id_kategori' => $id_kategori,
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'induk_id' => $induk_id

        );

        $this->M_kategori->UpdateDatakategori($DataUpdate, $id_kategori);
        redirect(base_url('kategori/'));
    }

    public function delete($id_kategori)
    {
        $this->M_kategori->DeleteDatakategori($id_kategori);
        redirect(base_url('kategori/'));
    }
    public function searchKategoriByNama($nama)
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->like('LOWER(nama)', strtolower($nama)); // Perbandingan case-insensitive
        $query = $this->db->get();
        return $query->result();
    }
}
