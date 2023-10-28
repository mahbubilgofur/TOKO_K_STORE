<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $this->load->model('m_setting');
        $this->load->model('m_laporan');
    }
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('laporan/viewlaporan');
        $this->load->view('layout/footer');
    }
    public function laporan_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->laporan_harian($tanggal, $bulan, $tahun)
        );
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('laporan/viewlaporan_harian', $data);
        $this->load->view('layout/footer');
    }
    public function laporan_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->laporan_bulanan($bulan, $tahun)
        );
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('laporan/viewlaporan_bulanan', $data);
        $this->load->view('layout/footer');
    }
    public function laporan_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->laporan_tahunan($tahun)
        );
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('laporan/viewlaporan_tahunan', $data);
        $this->load->view('layout/footer');
    }
}
