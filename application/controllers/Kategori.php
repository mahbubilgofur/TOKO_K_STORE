<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
    }
    public function index()
    {
        $querykategori = $this->M_kategori->getdatakategori1();
        $kategori = $this->M_kategori->getDatakategori();
        $DATA = array('data_kategori' => $kategori, 'querykategori' => $querykategori);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('kategori/viewkategori', $DATA);
        $this->load->view('layout/footer');
    }

    public function Inputkategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama = $this->input->post('nama');


        $DataInsert = array(
            'id_kategori' => $id_kategori,
            'nama' => $nama,

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
        $this->load->view('layout/navbar');
        $this->load->view('kategori/editkategori', $DATA);
        $this->load->view('layout/footer');
    }
    public function updatekategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama = $this->input->post('nama');



        $DataUpdate = array(
            'id_kategori' => $id_kategori,
            'nama' => $nama,

        );

        $this->M_kategori->UpdateDatakategori($DataUpdate, $id_kategori);
        redirect(base_url('kategori/'));
    }

    public function delete($id_kategori)
    {
        $this->M_kategori->DeleteDatakategori($id_kategori);
        redirect(base_url('kategori/'));
    }
}
