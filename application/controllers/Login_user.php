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
        // Ganti 'YOUR_RECAPTCHA_SECRET_KEY' dengan kunci rahasia reCAPTCHA Anda
        $recaptchaSecretKey = '6LfbTUAoAAAAAJucmrsloHn44764JRxOSzNNyX8N'; // Ganti dengan kunci rahasia reCAPTCHA Anda

        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // Jika validasi form berhasil
        if ($this->form_validation->run() == true) {
            // Validasi reCAPTCHA
            $recaptchaResponse = $this->input->post('g-recaptcha-response');

            // Verifikasi reCAPTCHA
            $recaptchaVerify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}");
            $recaptchaData = json_decode($recaptchaVerify);

            if (!$recaptchaData->success) {
                // Verifikasi reCAPTCHA gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifikasi reCAPTCHA gagal. Silakan coba lagi.</div>');
                redirect(base_url('login'));
            } else {
                // Verifikasi reCAPTCHA berhasil, lanjutkan dengan proses login
                $this->_login();
            }
        } else {
            // Validasi form gagal, tampilkan kembali halaman login
            $this->load->view('login_user');
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
                    'role_id' => $user->role_id,
                    'nama' => $user->nama,
                    'gambar' => $user->gambar,
                    'id' => $user->id // Tambahkan kolom 'id'
                ];
                $this->session->set_userdata($data);

                if ($user->role_id == 2) {
                    redirect(base_url('home/index'));
                } else {
                    redirect(base_url('home/index'));
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
            // Data yang akan disimpan ke database
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' =>  htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'gambar' => 'gambar_user/user.jpg' // Default image path
            ];

            $this->db->insert('tbl_user', $data);

            if ($this->db->affected_rows() > 0) {
                // Ambil ID pengguna yang baru saja di-insert
                $userId = $this->db->insert_id();
                $current_date = date('Ymd');
                $new_image_name = $userId . '_' . $current_date . '.jpg';
                // Move the default image to the users directory with the new name
                $default_image_path = FCPATH . 'gambar_user/user.jpg';
                $user_image_path = FCPATH . 'gambar_user/' . $new_image_name;
                copy($default_image_path, $user_image_path);

                // Update the 'profil' column with the new image name
                $this->db->set('gambar', $new_image_name);
                $this->db->where('id', $userId);
                $this->db->update('tbl_user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil register
              </div>');
                redirect(base_url('login_user'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal register
              </div>');
                redirect(base_url('login_user/register'));
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
        $this->cart->destroy();

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
            $redirect_url = base_url('login_user'); // Atur pengalihan default
        }

        // Set pesan flashdata dan redirect
        $this->session->set_flashdata('message', $message);
        redirect($redirect_url);
    }
}
