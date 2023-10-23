<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Img extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gambarproduk');
        $this->load->model('m_produk');
    }

    public function index()
    {
        $data['gambarproduk'] = $this->m_gambarproduk->get_all_data();

        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('img_produk/viewproduk', $data);
        $this->load->view('layout/footer');
    }

    public function add($id_produk)
    {
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan Gambar',
            'required',
            array('required' => '%s Harus Di Isi !')
        );


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './detail_produk/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Gambar Produk',
                    'error_upload' => $this->upload->display_errors(),
                    'produk' => $this->m_produk->get_data($id_produk),
                    'gambar' => $this->m_gambarproduk->get_gambar($id_produk),
                    'isi' => 'gambarproduk/v_add',
                );
                $this->load->view('layout/header');
                $this->load->view('admin/navbar');
                $this->load->view('img_produk/input_img', $data, false);
                $this->load->view('layout/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambarproduk/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_produk' => $id_produk,
                    'keterangan' => $this->input->post('keterangan'),
                    'gambar' => $upload_data['uploads']['file_name'],

                );
                $this->m_gambarproduk->add($data);
                $this->session->set_flashdata('pesan', 'Gambar Berhasil DiTambahkan');
                redirect('img/add/' . $id_produk);
            }
        }

        $data = array(
            'title' => 'Gambar Produk',
            'produk' => $this->m_produk->get_data($id_produk),
            'gambar' => $this->m_gambarproduk->get_gambar($id_produk),
            'isi' => 'gambarproduk/v_add',
        );
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('img_produk/input_img', $data, false);
        $this->load->view('layout/footer');
    }
    public function delete($id_produk, $id_gambar)
    {
        // Hapus Gambar
        $gambar = $this->m_gambarproduk->get_data($id_gambar);
        if ($gambar->gambar != "") {
            unlink('./assets/gambarproduk/' . $gambar->gambar);
        }
        // End Hapus Gambar

        // Hapus data gambar dari database
        $this->m_gambarproduk->delete($id_gambar);

        $this->session->set_flashdata('pesan', 'Gambar berhasil dihapus');
        redirect('img/add/' . $id_produk);
    }
}
