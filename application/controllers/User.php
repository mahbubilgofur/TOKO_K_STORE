<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role_id = $this->input->post('role_id');

        $DataInsert = array(
            'id' => $id,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id
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

    public function update($id)
    {
        $user = $this->M_user->getDatauserDetail($id);
        $DATA = array('data_user' => $user);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('user/edituser', $DATA);
        $this->load->view('layout/footer');
    }
    public function updateuser()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role_id = $this->input->post('role_id');


        $DataUpdate = array(
            'id' => $id,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id
        );

        $this->M_user->UpdateDatauser($DataUpdate, $id);
        redirect(base_url('user/'));
    }

    public function delete($id)
    {
        $this->M_user->DeleteDatauser($id);
        redirect(base_url('user/'));
    }
}
