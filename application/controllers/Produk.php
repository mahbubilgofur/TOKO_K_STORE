<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
    }
    public function index()
    {
        $produk = $this->M_produk->getDataproduk();
        $queryproduk = $this->M_produk->getDataproduk1();
        $DATA = array('data_produk' => $produk, 'queryproduk' => $queryproduk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('produk/viewproduk', $DATA);
        $this->load->view('layout/footer');
    }

    public function Inputproduk()
    {
        $id_produk = $this->input->post('id_produk');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $gambar = $this->input->post('gambar');
        $deskripsi = $this->input->post('deskripsi');
        $id_kategori = $this->input->post('id_kategori');

        $DataInsert = array(
            'id_produk' => $id_produk,
            'nama' => $nama,
            'harga' => $harga,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
            'id_kategori' => $id_kategori
        );

        if ($this->M_produk->InsertDataproduk($DataInsert)) {
            // Input berhasil
            $this->session->set_flashdata('success', 'Data produk berhasil ditambahkan.');
            redirect(base_url('produk/'));
        } else {
            // Input gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data produk.');
            redirect(base_url('produk/'));
        }
    }

    public function update($id_produk)
    {
        $produk = $this->M_produk->getDataprodukDetail($id_produk);
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
        $gambar = $this->input->post('gambar');
        $deskripsi = $this->input->post('deskripsi');
        $id_kategori = $this->input->post('id_kategori');


        $DataUpdate = array(
            'id_produk' => $id_produk,
            'nama' => $nama,
            'harga' => $harga,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
            'id_kategori' => $id_kategori
        );

        $this->M_produk->UpdateDataproduk($DataUpdate, $id_produk);
        redirect(base_url('produk/'));
    }

    public function delete($id_produk)
    {
        $this->M_produk->DeleteDataproduk($id_produk);
        redirect(base_url('produk/'));
    }
}
