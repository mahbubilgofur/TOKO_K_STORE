<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('m_user');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('login_user');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->m_user->get_user_by_email($email);

        if ($user) {
            if (password_verify($password, $user->password)) {
                $data = [
                    'email' => $user->email,
                    'role_id' => $user->role_id
                ];
                $this->session->set_userdata($data);

                if ($user->role_id == 2) {
                    redirect(base_url('home_user'));
                } else {
                    redirect(base_url('home_user'));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect(base_url('login_user'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar</div>');
            redirect(base_url('login_user'));
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password wajib minimal 3 karakter'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('register_user');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' =>  htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2
            ];

            $this->db->insert('tbl_user', $data);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil register
              </div>');
                redirect(base_url('login/login_user'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal register
              </div>');
                redirect(base_url('register_user'));
            }
        }
    }



    public function logout()
    {
        // Periksa role_id sebelum melakukan pengalihan
        $role_id = $this->session->userdata('role_id');

        // Hapus data sesi
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        // Set pesan sesuai dengan role_id
        if ($role_id == 1) {
            $message = '<div class="alert alert-success" role="alert">Anda berhasil logout</div>';
            $redirect_url = base_url('login');
        } elseif ($role_id == 2) {
            $message = '<div class="alert alert-success" role="alert">Anda berhasil logout</div>';
            $redirect_url = base_url('login_user');
        } else {
            // Handle kasus lain jika diperlukan
            $message = '<div class="alert alert-success" role="alert">Anda berhasil logout</div>';
            $redirect_url = base_url('login'); // Atur pengalihan default
        }

        // Set pesan flashdata dan redirect
        $this->session->set_flashdata('message', $message);
        redirect($redirect_url);
    }
}
