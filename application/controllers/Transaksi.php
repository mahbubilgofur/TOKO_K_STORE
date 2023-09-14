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

        // Menambahkan kondisi untuk role_id
        if ($role_id == 2) {
            // Jika role_id adalah 2, arahkan ke halaman tertentu atau berikan pesan kesalahan
            redirect('home_user');
        }
        // Jika role_id adalah 1 atau jenis lain yang diizinkan, biarkan pengguna melanjutkan

        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $transaksi = $this->m_transaksi->getDatatransaksi();
        $DATA = array('data_transaksi' => $transaksi);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('transaksi/viewtransaksi', $DATA);
        $this->load->view('layout/footer');
    }

    public function Inputtransaksi()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $id_user = $this->input->post('id_user');
        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlah');
        $total = $this->input->post('total');
        $tgl_transaksi = $this->input->post('tgl_transaksi');

        $DataInsert = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'total' => $total,
            'tgl_transaksi' => $tgl_transaksi
        );

        if ($this->m_transaksi->InsertDatatransaksi($DataInsert)) {
            // Input berhasil
            $this->session->set_flashdata('success', 'Data transaksi berhasil ditambahkan.');
            redirect(base_url('transaksi/'));
        } else {
            // Input gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data transaksi.');
            redirect(base_url('transaksi/'));
        }
    }

    public function update($id_transaksi)
    {
        $transaksi = $this->m_transaksi->getDatatransaksiDetail($id_transaksi);
        $DATA = array('data_transaksi' => $transaksi);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
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
}
