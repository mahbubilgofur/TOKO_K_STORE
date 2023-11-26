<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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

        $this->load->model('m_produk');
        $this->load->model('m_kategori');
    }
    public function index()
    {

        $produk = $this->m_produk->getDataproduk();
        $queryproduk = $this->m_produk->getDataproduk1();
        $getKategori = $this->m_produk->getKategori();

        $DATA = array('data_produk' => $produk, 'queryproduk' => $queryproduk, 'getketegori' => $getKategori);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('produk/viewproduk', $DATA);
        $this->load->view('layout/footer');
    }

    public function Inputproduk()
    {
        $this->load->library('form_validation');
        $this->load->library('upload');

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[35]');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, arahkan kembali ke halaman produk dengan pesan kesalahan
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('produk/'));
        } else {
            $id_produk = $this->input->post('id_produk');
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $id_kategori = $this->input->post('id_kategori');
            $berat = $this->input->post('berat');
            $stok = $this->input->post('stok');

            $tanggal = date('Y-m-d');

            $config['upload_path'] = './gambarproduk/'; // Direktori penyimpanan gambar
            $config['allowed_types'] = 'jpg|jpeg|png|webp'; // Format gambar yang diizinkan
            $config['max_size'] = 10000; // Ukuran maksimum gambar (dalam kilobita)
            $config['max_width'] = 10000; // Lebar maksimum gambar (dalam piksel)
            $config['max_height'] = 10000; // Tinggi maksimum gambar (dalam piksel)

            $this->load->library('upload');

            // Inisialisasi array untuk menyimpan nama gambar
            $gambar_names = array();

            for ($i = 1; $i <= 5; $i++) {
                $field_name = 'gambar' . $i;

                if ($_FILES[$field_name]['size'] > 0) {
                    $config['file_name'] = $nama . '_' . $tanggal . '_gambar' . $i;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload($field_name)) {
                        $data = $this->upload->data();
                        $gambar_name = $data['file_name']; // Nama gambar yang berhasil diupload
                        $gambar_names[] = $gambar_name;
                    } else {
                        $this->session->set_flashdata('error', 'Gagal mengunggah ' . $field_name . ': ' . $this->upload->display_errors());
                        redirect(base_url('produk/'));
                    }
                }
            }

            $DataInsert = array(
                'id_produk' => $id_produk,
                'nama' => $nama,
                'harga' => $harga,
                'gambar1' => isset($gambar_names[0]) ? $gambar_names[0] : '',
                'gambar2' => isset($gambar_names[1]) ? $gambar_names[1] : '',
                'gambar3' => isset($gambar_names[2]) ? $gambar_names[2] : '',
                'gambar4' => isset($gambar_names[3]) ? $gambar_names[3] : '',
                'gambar5' => isset($gambar_names[4]) ? $gambar_names[4] : '',
                'deskripsi' => $deskripsi,
                'id_kategori' => $id_kategori,
                'berat' => $berat,
                'stok' => $stok,


            );

            // Simpan data ke dalam database (sesuaikan dengan model Anda)
            $this->m_produk->InsertDataproduk($DataInsert);

            // Hapus data sesi "flashdata"
            $this->session->unset_userdata('nama');
            $this->session->unset_userdata('harga');
            $this->session->unset_userdata('deskripsi');
            $this->session->unset_userdata('id_kategori');
            $this->session->unset_userdata('berat');
            $this->session->unset_userdata('stok');

            // Redirect ke halaman yang sesuai setelah berhasil menyimpan
            redirect(base_url('produk/'));
        }
    }



    // fungsi Update
    public function update($id_produk)
    {
        $queryproduk = $this->m_produk->getDataproduk1();
        $getKategori = $this->m_produk->getKategori();
        $produk = $this->m_produk->getDataprodukDetail($id_produk);
        $DATA = array('data_produk' => $produk, 'queryproduk' => $queryproduk, 'getketegori' => $getKategori);
        $this->load->view('layout/header');
        $this->load->view('admin/navbar');
        $this->load->view('produk/editproduk', $DATA);
        $this->load->view('layout/footer');
    }



    public function updateproduk()
    {
        $this->load->library('form_validation');
        $this->load->library('upload');

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[35]');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, redirect back to the produk page with an error message
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('produk/'));
        } else {
            $id_produk = $this->input->post('id_produk');
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $id_kategori = $this->input->post('id_kategori');
            $berat = $this->input->post('berat');
            $stok = $this->input->post('stok');

            $tanggal = date('Y-m-d');

            // Initialize an array to store image names
            $gambar_names = array();

            for ($i = 1; $i <= 5; $i++) {
                $field_name = 'gambar' . $i;

                // Check if the file input is set and not empty
                if (!empty($_FILES[$field_name]['name'])) {
                    // Delete the old image if it exists
                    $gambar_lama = $this->input->post('gambar' . $i . '_old');
                    if (!empty($gambar_lama)) {
                        unlink('./gambarproduk/' . $gambar_lama);
                    }

                    $config['upload_path'] = './gambarproduk/';
                    $config['allowed_types'] = 'jpg|jpeg|png|webp';
                    $config['max_size'] = 1000;
                    $config['max_width'] = 1000;
                    $config['max_height'] = 1000;
                    $config['file_name'] = $nama . '_' . $tanggal . '_gambar' . $i;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload($field_name)) {
                        $data = $this->upload->data();
                        $gambar_name = $data['file_name']; // Nama gambar yang berhasil diunggah
                        $gambar_names[] = $gambar_name;
                    } else {
                        $this->session->set_flashdata('error', 'Failed to upload ' . $field_name . ': ' . $this->upload->display_errors());
                        redirect(base_url('produk/'));
                    }
                } else {
                    // Jika tidak ada gambar baru yang diunggah, gunakan nama gambar lama
                    $gambar_names[] = $this->input->post('gambar' . $i . '_old');
                }
            }

            $DataUpdate = array(
                'id_produk' => $id_produk,
                'nama' => $nama,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
                'id_kategori' => $id_kategori,
                'berat' => $berat,
                'stok' => $stok,
            );

            // Hanya perbarui kolom gambar jika setidaknya satu gambar baru diunggah
            $gambar_names = array_filter($gambar_names); // Remove empty values
            if (!empty($gambar_names)) {
                // Use the updated image names if any
                for ($i = 0; $i < min(5, count($gambar_names)); $i++) {
                    $DataUpdate['gambar' . ($i + 1)] = $gambar_names[$i];
                }
            }

            // Simpan data ke dalam database menggunakan model
            $this->load->model('m_produk'); // Sesuaikan dengan nama model Anda
            $this->m_produk->updateDataProduk($id_produk, $DataUpdate);

            // Hapus data sesi "flashdata"
            $this->session->unset_userdata('nama');
            $this->session->unset_userdata('harga');
            $this->session->unset_userdata('deskripsi');
            $this->session->unset_userdata('id_kategori');
            $this->session->unset_userdata('berat');
            $this->session->unset_userdata('stok');

            // Redirect ke halaman yang sesuai setelah berhasil menyimpan
            redirect(base_url('produk/'));
        }
    }





    //fungsi Delete
    public function delete($id_produk)
    {
        // Hapus gambar
        $produk = $this->m_produk->getProdukById($id_produk);
        if ($produk) {
            $gambarPath = './gambarproduk/' . $produk->gambar;

            // Check if the file exists before attempting to unlink
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }

            // Hapus data produk dari database
            $this->m_produk->DeleteDataproduk($id_produk);
            $this->session->set_flashdata('pesan', 'Data Berhasil DiDelete');
        } else {
            $this->session->set_flashdata('pesan', 'Produk tidak ditemukan');
        }

        redirect('produk/');
    }
}












//     public function updateproduk()
// {
//     $this->load->library('form_validation');
//     $this->load->library('upload');

//     $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[35]');
//     $this->form_validation->set_rules('harga', 'Harga', 'trim|required|max_length[100]');
//     $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required|max_length[100]');
//     $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required|max_length[50]');
//     $this->form_validation->set_rules('berat', 'Berat', 'trim|required|max_length[50]');
//     $this->form_validation->set_rules('stok', 'Stok', 'trim|required|max_length[50]');

//     if ($this->form_validation->run() == FALSE) {
//         // If validation fails, redirect back to the produk page with an error message
//         $this->session->set_flashdata('error', validation_errors());
//         redirect(base_url('produk/'));
//     } else {
//         $id_produk = $this->input->post('id_produk');
//         $nama = $this->input->post('nama');
//         $harga = $this->input->post('harga');
//         $deskripsi = $this->input->post('deskripsi');
//         $id_kategori = $this->input->post('id_kategori');
//         $berat = $this->input->post('berat');
//         $stok = $this->input->post('stok');

//         $tanggal = date('Y-m-d');

//         // Initialize an array to store image names
//         $gambar_names = array();

//         for ($i = 1; $i <= 5; $i++) {
//             $field_name = 'gambar' . $i;

//             if ($_FILES[$field_name]['size'] > 0) {
//                 // Delete the old image if it exists
//                 $gambar_lama = $this->input->post('gambar' . $i . '_old');
//                 if (!empty($gambar_lama)) {
//                     unlink('./gambarproduk/' . $gambar_lama);
//                 }

//                 $config['upload_path'] = './gambarproduk/';
//                 $config['allowed_types'] = 'jpg|jpeg|png|webp';
//                 $config['max_size'] = 1000;
//                 $config['max_width'] = 1000;
//                 $config['max_height'] = 1000;
//                 $config['file_name'] = $nama . '_' . $tanggal . '_gambar' . $i;

//                 $this->upload->initialize($config);

//                 if ($this->upload->do_upload($field_name)) {
//                     $data = $this->upload->data();
//                     $gambar_name = $data['file_name']; // Nama gambar yang berhasil diunggah
//                     $gambar_names[] = $gambar_name;
//                 } else {
//                     $this->session->set_flashdata('error', 'Failed to upload ' . $field_name . ': ' . $this->upload->display_errors());
//                     redirect(base_url('produk/'));
//                 }
//             } else {
//                 // If no new image is uploaded, use the old image name
//                 $gambar_names[] = $this->input->post('gambar' . $i . '_old');
//             }
//         }

//         $DataUpdate = array(
//             'id_produk' => $id_produk,
//             'nama' => $nama,
//             'harga' => $harga,
//             'deskripsi' => $deskripsi,
//             'id_kategori' => $id_kategori,
//             'berat' => $berat,
//             'stok' => $stok,
//         );

//         // Only update the image fields if at least one new image is uploaded
//         if (!empty(array_filter($gambar_names))) {
//             $DataUpdate['gambar1'] = isset($gambar_names[0]) ? $gambar_names[0] : '';
//             $DataUpdate['gambar2'] = isset($gambar_names[1]) ? $gambar_names[1] : '';
//             $DataUpdate['gambar3'] = isset($gambar_names[2]) ? $gambar_names[2] : '';
//             $DataUpdate['gambar4'] = isset($gambar_names[3]) ? $gambar_names[3] : '';
//             $DataUpdate['gambar5'] = isset($gambar_names[4]) ? $gambar_names[4] : '';
//         }

//         // Simpan data ke dalam database menggunakan model
//         $this->load->model('m_produk'); // Sesuaikan dengan nama model Anda
//         $this->m_produk->updateDataProduk($id_produk, $DataUpdate);

//         // Hapus data sesi "flashdata"
//         $this->session->unset_userdata('nama');
//         $this->session->unset_userdata('harga');
//         $this->session->unset_userdata('deskripsi');
//         $this->session->unset_userdata('id_kategori');
//         $this->session->unset_userdata('berat');
//         $this->session->unset_userdata('stok');

//         // Redirect ke halaman yang sesuai setelah berhasil menyimpan
//         redirect(base_url('produk/'));
//     } 
// }


// public function update($id_produk)
// {
//     $queryproduk = $this->m_produk->getDataproduk1();
//     $getKategori = $this->m_produk->getKategori();
//     $produk = $this->m_produk->getDataprodukDetail($id_produk);
//     $DATA = array('data_produk' => $produk, 'queryproduk' => $queryproduk, 'getketegori' => $getKategori);
//     $this->load->view('layout/header');
//     $this->load->view('admin/navbar');
//     $this->load->view('produk/editproduk', $DATA);
//     $this->load->view('layout/footer');
// }



// public function updateproduk()
// {
// $this->load->library('form_validation');
// $this->load->library('upload');

// $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[35]');
// $this->form_validation->set_rules('harga', 'Harga', 'trim|required|max_length[100]');
// $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required|max_length[100]');
// $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required|max_length[50]');
// $this->form_validation->set_rules('berat', 'Berat', 'trim|required|max_length[50]');
// $this->form_validation->set_rules('stok', 'Stok', 'trim|required|max_length[50]');

// if ($this->form_validation->run() == FALSE) {
//     // If validation fails, redirect back to the produk page with an error message
//     $this->session->set_flashdata('error', validation_errors());
//     redirect(base_url('produk/'));
// } else {
//     $id_produk = $this->input->post('id_produk');
//     $nama = $this->input->post('nama');
//     $harga = $this->input->post('harga');
//     $deskripsi = $this->input->post('deskripsi');
//     $id_kategori = $this->input->post('id_kategori');
//     $berat = $this->input->post('berat');
//     $stok = $this->input->post('stok');

//     $tanggal = date('Y-m-d');

//     // Initialize an array to store image names
//     $gambar_names = array();

//     for ($i = 1; $i <= 5; $i++) {
//         $field_name = 'gambar' . $i;

//         // Check if the file input is set and not empty
//         if (!empty($_FILES[$field_name]['name'])) {
//             // Delete the old image if it exists
//             $gambar_lama = $this->input->post('gambar' . $i . '_old');
//             if (!empty($gambar_lama)) {
//                 unlink('./gambarproduk/' . $gambar_lama);
//             }

//             $config['upload_path'] = './gambarproduk/';
//             $config['allowed_types'] = 'jpg|jpeg|png|webp';
//             $config['max_size'] = 1000;
//             $config['max_width'] = 1000;
//             $config['max_height'] = 1000;
//             $config['file_name'] = $nama . '_' . $tanggal . '_gambar' . $i;

//             $this->upload->initialize($config);

//             if ($this->upload->do_upload($field_name)) {
//                 $data = $this->upload->data();
//                 $gambar_name = $data['file_name']; // Nama gambar yang berhasil diunggah
//                 $gambar_names[] = $gambar_name;
//             } else {
//                 $this->session->set_flashdata('error', 'Failed to upload ' . $field_name . ': ' . $this->upload->display_errors());
//                 redirect(base_url('produk/'));
//             }
//         } else {
//             // Jika tidak ada gambar baru yang diunggah, gunakan nama gambar lama
//             $gambar_names[] = $this->input->post('gambar' . $i . '_old');
//         }
//     }

//     $DataUpdate = array(
//         'id_produk' => $id_produk,
//         'nama' => $nama,
//         'harga' => $harga,
//         'deskripsi' => $deskripsi,
//         'id_kategori' => $id_kategori,
//         'berat' => $berat,
//         'stok' => $stok,
//     );

//     // Hanya perbarui kolom gambar jika setidaknya satu gambar baru diunggah
//     $gambar_names = array_filter($gambar_names); // Remove empty values
//     if (!empty($gambar_names)) {
//         // Use the updated image names if any
//         for ($i = 0; $i < min(5, count($gambar_names)); $i++) {
//             $DataUpdate['gambar' . ($i + 1)] = $gambar_names[$i];
//         }
//     }

//     // Simpan data ke dalam database menggunakan model
//     $this->load->model('m_produk'); // Sesuaikan dengan nama model Anda
//     $this->m_produk->updateDataProduk($id_produk, $DataUpdate);

//     // Hapus data sesi "flashdata"
//     $this->session->unset_userdata('nama');
//     $this->session->unset_userdata('harga');
//     $this->session->unset_userdata('deskripsi');
//     $this->session->unset_userdata('id_kategori');
//     $this->session->unset_userdata('berat');
//     $this->session->unset_userdata('stok');

//     // Redirect ke halaman yang sesuai setelah berhasil menyimpan
//     redirect(base_url('produk/'));
// }
// }