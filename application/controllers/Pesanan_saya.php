<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
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

        }
        $this->load->model('m_setting');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_transaksi1');
    }
    public function index()
    {
        $diterima = $this->m_transaksi1->diterima();
        $dikirim = $this->m_transaksi1->dikirim();
        $diproses = $this->m_transaksi1->diproses();
        $belum_bayar = $this->m_transaksi1->belum_bayar();
        $DATA = array('belum_bayar' => $belum_bayar, 'diproses' => $diproses, 'dikirim' => $dikirim, 'diterima' => $diterima);
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('homepesanan/content', $DATA, false);
        $this->load->view('home/footer');
    }
    public function bayar($id_transaksi)
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './file_bukti_pembayaran/'; // Direktori penyimpanan gambar
            $config['allowed_types'] = 'jpg|jpeg|png|webp'; // Format gambar yang diizinkan
            $config['max_size'] = 10000; // Ukuran maksimum gambar (dalam kilobita)
            $config['max_width'] = 10000; // Lebar maksimum gambar (dalam piksel)
            $config['max_height'] = 10000; // Tinggi maksimum gambar (dalam piksel)


            $this->load->library('upload', $config);
            $field_name = 'bukti_bayar';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'rekening' => $this->m_transaksi1->rekening(),
                    'pesanan' => $this->m_transaksi1->detail_pesanan($id_transaksi),
                    'error_upload' => $this->upload->display_errors()
                );
                $this->load->view('home/header');
                $this->load->view('home/navbar');
                $this->load->view('homebayar/content', $data, false);
                $this->load->view('home/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './file_buktipembayaran/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_transaksi' => $id_transaksi,
                    'atas_nama' => $this->input->post('atas_nama'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'no_rek ' => $this->input->post('no_rek'),
                    'status_bayar ' => '1',
                    'bukti_bayar' => $upload_data['uploads']['file_name']

                );

                $this->m_transaksi1->upload_buktibayar($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil DiTambahkan');
                redirect('pesanan_saya/');
            }
        }
        $data = array(
            'rekening' => $this->m_transaksi1->rekening(),
            'pesanan' => $this->m_transaksi1->detail_pesanan($id_transaksi)
        );
        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('homebayar/content', $data, false);
        $this->load->view('home/footer');
    }
    public function diterima($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '3'
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Diterima !!!');
        redirect('pesanan_saya');
    }
}
