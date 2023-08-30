<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }
    public function index()
    {
        $user = $this->M_user->getDatauser();
        $DATA = array('data_user' => $user);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('user/viewuser', $DATA);
        $this->load->view('layout/footer');
    }

    public function Inputuser()
    {
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $alamat = $this->input->post('alamat');
        $level = $this->input->post('level');

        $DataInsert = array(
            'id_user' => $id_user,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'alamat' => $alamat,
            'level' => $level
        );

        if ($this->M_user->InsertDatauser($DataInsert)) {
            // Input berhasil
            $this->session->set_flashdata('success', 'Data user berhasil ditambahkan.');
            redirect(base_url('user/'));
        } else {
            // Input gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data user.');
            redirect(base_url('user/'));
        }
    }

    public function update($id_user)
    {
        $user = $this->M_user->getDatauserDetail($id_user);
        $DATA = array('data_user' => $user);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('user/edituser', $DATA);
        $this->load->view('layout/footer');
    }
    public function updateuser()
    {
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $alamat = $this->input->post('alamat');
        $level = $this->input->post('level');


        $DataUpdate = array(
            'id_user' => $id_user,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'alamat' => $alamat,
            'level' => $level
        );

        $this->M_user->UpdateDatauser($DataUpdate, $id_user);
        redirect(base_url('user/'));
    }

    public function delete($id_user)
    {
        $this->M_user->DeleteDatauser($id_user);
        redirect(base_url('user/'));
    }
}
