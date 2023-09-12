<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Variasiproduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('M_variasiproduk');
    }
    public function index()
    {
        $variasiproduk = $this->M_variasiproduk->getDatavariasiproduk();
        $DATA = array('data_variasiproduk' => $variasiproduk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('variasiproduk/viewvariasiproduk', $DATA);
        $this->load->view('layout/footer');
    }

    public function Inputvariasiproduk()
    {
        $id_variasiproduk = $this->input->post('id_variasiproduk');
        $nama = $this->input->post('nama');
        $size = $this->input->post('size');
        $stok = $this->input->post('stok');


        $DataInsert = array(
            'id_variasiproduk' => $id_variasiproduk,
            'nama' => $nama,
            'size' => $size,
            'stok' => $stok
        );

        if ($this->M_variasiproduk->InsertDatavariasiproduk($DataInsert)) {
            // Input berhasil
            $this->session->set_flashdata('success', 'Data variasiproduk berhasil ditambahkan.');
            redirect(base_url('variasiproduk/'));
        } else {
            // Input gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data variasiproduk.');
            redirect(base_url('variasiproduk/'));
        }
    }

    public function update($id_variasiproduk)
    {
        $variasiproduk = $this->M_variasiproduk->getDatavariasiprodukDetail($id_variasiproduk);
        $DATA = array('data_variasiproduk' => $variasiproduk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('variasiproduk/editvariasiproduk', $DATA);
        $this->load->view('layout/footer');
    }
    public function updatevariasiproduk()
    {
        $id_variasiproduk = $this->input->post('id_variasiproduk');
        $nama = $this->input->post('nama');
        $size = $this->input->post('size');
        $stok = $this->input->post('stok');

        $DataUpdate = array(
            'id_variasiproduk' => $id_variasiproduk,
            'nama' => $nama,
            'size' => $size,
            'stok' => $stok
        );

        $this->M_variasiproduk->UpdateDatavariasiproduk($DataUpdate, $id_variasiproduk);
        redirect(base_url('variasiproduk/'));
    }

    public function delete($id_variasiproduk)
    {
        $this->M_variasiproduk->DeleteDatavariasiproduk($id_variasiproduk);
        redirect(base_url('variasiproduk/'));
    }
}
