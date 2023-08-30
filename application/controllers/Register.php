<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'NAMA', 'required|trim');
        $this->form_validation->set_rules('email', 'EMAIL', 'required|trim|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password harus sama',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $this->registerUser();
        }
    }
    private function registerUser()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' =>  htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'gambar' => 1,
            'role_id' => 1,
        ];

        $this->db->insert('tbl_user', $data);

        $this->loginUser($data['email'], $this->input->post('password1'));
    }

    private function loginUser($email, $password)
    {
        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        if ($user && password_verify($password, $user['password'])) {
            $user_data = [
                'user_id' => $user['id_user'],
                'user_email' => $user['email'],
                'user_role' => $user['role_id']
                // ... other user data you want to store in session
            ];
            $this->session->set_userdata($user_data);

            if ($user['role_id'] == 1) {
                redirect('admin/dashboard');
            } else {
                redirect('user/dashboard');
            }
        } else {
            $this->session->set_flashdata('message', 'Registration successful, but login failed.');
            redirect('login');
        }
    }
}
