<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_user');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->M_user->get_user_by_email($email);

        if ($user) {
            if (password_verify($password, $user->password)) {
                $data = [
                    'email' => $user->email,
                    'role_id' => $user->role_id
                ];
                $this->session->set_userdata($data);

                if ($user->role_id == 1) {
                    redirect(base_url('admin'));
                } else {
                    redirect(base_url('home')); // Ganti 'home' dengan halaman sesuai dengan role_id 2
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect(base_url('login'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar</div>');
            redirect(base_url('login'));
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
            $this->load->view('register');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' =>  htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 1
            ];

            $this->db->insert('tbl_user', $data);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil register
              </div>');
                redirect(base_url('login'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal register
              </div>');
                redirect(base_url('register'));
            }
        }
    }



    public function logout()
    {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('login');
    }


































    // public function login_user()
    // {
    //     $this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Harus Diisi !!!'));
    //     $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi !!!'));

    //     if ($this->form_validation->run() == TRUE) {
    //         // Form validasi berhasil, Anda bisa melanjutkan dengan proses login.
    //         $username = $this->input->post('username');
    //         $password = $this->input->post('password');
    //         $login_result = $this->user_login->login($username, $password);

    //         if ($login_result) {
    //             // Login berhasil, lakukan redirect atau tindakan sesuai dengan kebutuhan Anda.
    //             // Contoh redirect:
    //             redirect('dashboard'); // Ganti 'dashboard' dengan alamat yang sesuai.
    //         } else {
    //             // Login gagal, mungkin tampilkan pesan kesalahan.
    //             $data = array(
    //                 'title' => 'Login Gagal',
    //                 'error_message' => 'Username atau password salah.',
    //             );
    //             $this->load->view('login', $data);
    //         }
    //     } else {
    //         // Tampilkan halaman login dengan pesan kesalahan validasi.
    //         $data = array(
    //             'title' => 'Login',
    //         );
    //         $this->load->view('login', $data);
    //     }
    // }
}
