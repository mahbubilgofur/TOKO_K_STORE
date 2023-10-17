<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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

        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $transaksi = $this->m_transaksi->getDatatransaksi();
        $getuser = $this->m_transaksi->getuser();
        $getproduk = $this->m_transaksi->getproduk();
        $get_idtransaksi = $this->m_transaksi->get_idtransaksi();
        $detailtransaksi = $this->m_transaksi->getDetailDatatransaksi();
        $DATA = array('data_detailtransaksi' => $detailtransaksi, 'data_transaksi' => $transaksi, 'get_idtransaksi' => $get_idtransaksi, 'getuser' => $getuser, 'getproduk' => $getproduk);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('transaksi/viewtransaksi', $DATA);
        $this->load->view('layout/footer');
    }
    public function transaksi()
    {
        $transaksi = $this->m_transaksi->getDatatransaksi();
        $getuser = $this->m_transaksi->getuser();
        $getproduk = $this->m_transaksi->getproduk();
        $get_idtransaksi = $this->m_transaksi->get_idtransaksi();
        $detailtransaksi = $this->m_transaksi->getDetailDatatransaksi();
        $DATA = array('data_detailtransaksi' => $detailtransaksi, 'data_transaksi' => $transaksi, 'get_idtransaksi' => $get_idtransaksi, 'getuser' => $getuser, 'getproduk' => $getproduk);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('transaksi/inputtransaksi', $DATA);
        $this->load->view('layout/footer');
    }





    public function Inputtransaksi()
    {
        // Ambil data dari formulir utama transaksi
        $id_transaksi = $this->input->post('id_transaksi');
        $id_user = $this->input->post('id_user');
        $tgl_transaksi = $this->input->post('tgl_transaksi');

        // Data untuk tabel 'tbl_transaksi'
        $DataTransaksi = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'tgl_transaksi' => $tgl_transaksi
        );

        // Ambil data dari formulir detail transaksi
        $id_produk = $this->input->post('id_produk');
        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $id_variasiproduk = $this->input->post('id_variasiproduk');
        $total = $this->input->post('total');

        // Data untuk tabel 'detail_transaksi'
        $DataDetailTransaksi = array();

        // Loop untuk menggabungkan data dari formulir detail transaksi
        foreach ($id_produk as $key => $produk_id) {
            $detailData = array(
                'id_transaksi' => $id_transaksi,
                'id_produk' => $produk_id,
                'jumlah' => $jumlah[$key],
                'harga' => $harga[$key],
                'id_variasiproduk' => $id_variasiproduk[$key],
                'total' => $total[$key]
            );
            array_push($DataDetailTransaksi, $detailData);
        }

        // Lakukan transaksi database dengan menggunakan transaksi CI
        $this->db->trans_start();

        // Simpan data ke 'tbl_transaksi'
        $this->db->insert('tbl_transaksi', $DataTransaksi);

        // Simpan data ke 'detail_transaksi'
        $this->db->insert_batch('detail_transaksi', $DataDetailTransaksi);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            // Transaksi gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data transaksi.');
        } else {
            // Transaksi berhasil
            $this->session->set_flashdata('success', 'Data transaksi berhasil ditambahkan.');
        }

        redirect(base_url('transaksi/'));
    }



    public function update($id_transaksi)
    {
        $transaksi = $this->m_transaksi->getDatatransaksiDetail($id_transaksi);
        $DATA = array('data_transaksi' => $transaksi);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('transaksi/edittransaksi', $DATA);
        $this->load->view('layout/footer');
    }
    public function updatetransaksi()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $id_user = $this->input->post('id_user');
        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlah');
        $total = $this->input->post('total');
        $tgl_transaksi = $this->input->post('tgl_transaksi');


        $DataUpdate = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'total' => $total,
            'tgl_transaksi' => $tgl_transaksi
        );

        $this->m_transaksi->UpdateDatatransaksi($DataUpdate, $id_transaksi);
        redirect(base_url('transaksi/'));
    }

    public function delete($id_transaksi)
    {
        $this->m_transaksi->DeleteDatatransaksi($id_transaksi);
        redirect(base_url('transaksi/'));
    }


    public function transaksidetail()
    {
        $transaksi = $this->m_transaksi->getDetailDatatransaksi();
        $getuser = $this->m_transaksi->getuser();
        $getproduk = $this->m_transaksi->getproduk();
        $get_idtransaksi = $this->m_transaksi->get_idtransaksi();
        $DATA = array('data_detailtransaksi' => $transaksi, 'get_idtransaksi' => $get_idtransaksi, 'getuser' => $getuser, 'getproduk' => $getproduk);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('transaksi/viewdetail', $DATA);
        $this->load->view('layout/footer');
    }
}
