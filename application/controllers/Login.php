<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'user_id' => $user['id_user'], // Change 'id' to 'id_user'
                    'user_email' => $user['email'],
                    'user_role' => $user['role_id']
                    // ... other user data you want to store in session
                ];
                $this->session->set_userdata($data);

                if ($user['role_id'] == 1) {
                    redirect('admin/dashboard'); // Redirect to admin dashboard
                } else {
                    redirect('user/dashboard'); // Redirect to user dashboard
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah
                </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak ditemukan
            </div>');
            redirect('login');
        }
    }
}
