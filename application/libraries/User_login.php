<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_user');
    }

    public function login($username, $password)
    {
        // Ganti 'login_user' dengan model atau metode yang sesuai.
        $cek = $this->ci->m_user->login_user($username, $password);
        if ($cek) {
            $nama_user = $cek->nama_user;
            $username = $cek->username;
            $level_user = $cek->level_user;

            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            $this->ci->session->set_userdata('level_user', $level_user);
            redirect('admin');
        } else {
            $this->ci->session->set_flashdata('pesan', 'Username atau password salah');
            redirect('login');
        }
    }

    public function proteksi_halaman()
    {
        if (!$this->ci->session->userdata('username')) {
            $this->ci->session->set_flashdata('eror', 'Anda belum login');
            redirect('login/login_user');
        } else {
            // Redirect ke halaman yang sesuai setelah login.
            redirect('admin');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->unset_userdata('level_user');
        redirect('login/login_user');
    }
}
