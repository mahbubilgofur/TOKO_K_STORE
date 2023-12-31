<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Mendapatkan role_id dari sesi
        $role_id = $this->session->userdata('role_id');

        // Menambahkan kondisi untuk role_id
        if ($role_id == 1) {
            redirect('admin');
        }
        $this->load->model('m_setting');
        $this->load->model('m_produk');
        $this->load->model('m_user');
        $this->load->model('m_transaksi1');
        $this->load->library('cart');
        $this->load->helper('form');
        $this->load->library('session');
    }
    public function index()
    {
        $produk = $this->m_produk->getDataproduk();
        $queryproduk = $this->m_produk->getDataproduk1();
        $getKategori = $this->m_produk->getKategori();
        $getKategori1 = $this->m_produk->getcariKategori();
        $getuser = $this->m_produk->getuser();

        // Inisialisasi array untuk menyimpan detail produk dalam keranjang
        $data['produk_keranjang'] = array();
        shuffle($produk);
        // Ambil data keranjang
        $this->load->library('session');
        $keranjang_belanja = $this->session->userdata('keranjang_belanja');

        // Periksa apakah $keranjang_belanja adalah array sebelum melakukan perulangan
        if (is_array($keranjang_belanja)) {
            // Loop melalui ID produk dalam keranjang dan ambil detail produk
            foreach ($keranjang_belanja as $id_produk) {
                // Dapatkan data produk berdasarkan ID produk
                $produk_detail = $this->m_produk->getProdukById($id_produk);

                // Jika produk ditemukan, tambahkan ke array detail produk
                if ($produk_detail) {
                    $data['produk_keranjang'][] = $produk_detail;
                }
            }
        }
        $DATA = array(
            'data_produk' => $produk,
            'queryproduk' => $queryproduk,
            'getketegori' => $getKategori,
            'getcariketegori' => $getKategori1,
            'getuser' => $getuser,
            'produk_keranjang' => $data['produk_keranjang'], // Data keranjang
        );

        $this->load->view('home/header');
        $this->load->view('home/navbar');
        $this->load->view('homekeranjang/content', $DATA);
        $this->load->view('home/footer');
    }



    // public function add($produk_id)
    // {
    //     // Cek apakah pengguna sudah login dengan role_id 2
    //     if ($this->session->userdata('role_id') == 2) {
    //         // Pengguna sudah login, lanjutkan dengan menambahkan produk ke keranjang

    //         // Ambil data produk dari database berdasarkan ID produk
    //         $produk = $this->m_setting->getProdukById($produk_id);

    //         if ($produk) {
    //             // Data produk ditemukan, lanjutkan dengan menambahkannya ke keranjang

    //             // Ambil nilai qty dari inputan formulir
    //             $qty = $this->input->post('qty');
    //             if ($qty && is_numeric($qty) && $qty > 0) {
    //                 // Qty valid, lanjutkan dengan menambahkannya ke keranjang
    //                 $data = array(
    //                     'id'      => $produk->id_produk,
    //                     'qty'     => $qty,
    //                     'price'   => $produk->harga,
    //                     'name'    => $produk->nama,
    //                     'options' => array('gambar1' => $produk->gambar1, 'berat' => $produk->berat)
    //                 );

    //                 $this->cart->insert($data);

    //                 // Setelah menambahkan produk ke keranjang, Anda bisa melakukan apa yang diperlukan, seperti menampilkan pesan sukses atau mengarahkan ke halaman lain
    //                 // Contoh:
    //                 $this->session->set_flashdata('message', 'Produk berhasil ditambahkan ke keranjang.');
    //                 redirect('home/detail/' . $produk_id);
    //             } else {
    //                 // Qty tidak valid, tampilkan pesan kesalahan atau mengarahkan ke halaman lain
    //                 // Contoh:
    //                 $this->session->set_flashdata('error', 'Qty tidak valid.');
    //                 redirect('home/detail/' . $produk_id);
    //             }
    //         } else {
    //             // Produk tidak ditemukan, Anda bisa menangani ini dengan menampilkan pesan kesalahan atau mengarahkan ke halaman lain
    //             // Contoh:
    //             $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
    //             redirect('home');
    //         }
    //     } else {
    //         // Pengguna belum login dengan role_id 2, arahkan mereka ke halaman login_user
    //         redirect('login_user'); // Gantilah 'login_user' dengan URL sesuai dengan halaman login Anda
    //     }
    // }

    public function add($id_produk)
    {
        // Cek apakah pengguna sudah login dengan role_id 2
        if ($this->session->userdata('role_id') == 2) {
            // Pengguna sudah login, lanjutkan dengan menambahkan produk ke keranjang

            // Ambil data produk dari database berdasarkan ID produk
            $produk = $this->m_setting->getProdukById($id_produk);

            if ($produk) {
                // Data produk ditemukan, lanjutkan dengan menambahkannya ke keranjang

                // Ambil nilai qty dari inputan formulir
                $qty = $this->input->post('qty');

                // Validasi input qty
                if (!is_numeric($qty) || $qty <= 0) {
                    // Qty tidak valid, tampilkan pesan kesalahan atau mengarahkan ke halaman lain
                    // Contoh:
                    $this->session->set_flashdata('error', 'Qty tidak valid.');
                    redirect('home/detail/' . $id_produk);
                }

                // Jika ada variasi produk, ambil data variasi dari formulir
                $warna = $this->input->post('selected_color');
                $ukuran = $this->input->post('selected_size');

                // Validasi variasi yang dipilih
                if ($warna !== '0' && (empty($warna) || empty($ukuran))) {
                    // Variasi tidak valid, tampilkan pesan kesalahan atau arahkan ke halaman lain
                    // Contoh:
                    $this->session->set_flashdata('error', 'Harap pilih warna dan ukuran terlebih dahulu.');
                    redirect('home/detail/' . $id_produk);
                } elseif ($warna === '0' && empty($ukuran)) {
                    // Jika warna 0, ukuran wajib dipilih
                    $this->session->set_flashdata('error', 'Harap pilih ukuran terlebih dahulu.');
                    redirect('home/detail/' . $id_produk);
                }

                // Ambil data variasi produk berdasarkan warna dan ukuran yang dipilih
                $variasi = $this->m_setting->getVariasiByColorAndSize($id_produk, $warna, $ukuran);

                if (!$variasi) {
                    // Variasi tidak ditemukan, tampilkan pesan kesalahan atau arahkan ke halaman lain
                    // Contoh:
                    $this->session->set_flashdata('error', 'Variasi produk tidak ditemukan.');
                    redirect('home/detail/' . $id_produk);
                }

                $data = array(
                    'id'      => $produk->id_produk,
                    'qty'     => $qty,
                    'price'   => $variasi->harga,
                    'name'    => $produk->nama,
                    'options' => array(
                        'gambar'  => $variasi->gambar,
                        'berat'   => $produk->berat, // Berat dihitung berdasarkan produk tanpa *qty
                        'user_id' => $this->session->userdata('user_id'),
                        'harga'   => $variasi->harga,
                        'warna'   => $variasi->warna,
                        'ukuran'  => $variasi->ukuran,
                    ),
                );

                // Masukkan data produk ke dalam cart
                $this->cart->insert($data);

                // Setelah menambahkan produk ke keranjang, Anda bisa melakukan apa yang diperlukan
                // Contoh:
                $this->session->set_flashdata('message', 'Produk berhasil ditambahkan ke keranjang.');

                // Cek dari tombol mana request datang dan arahkan ke halaman yang sesuai
                if ($this->input->post('checkout_button')) {
                    redirect('belanja');
                } else {
                    redirect('home/detail/' . $id_produk);
                }
            } else {
                // Produk tidak ditemukan, Anda bisa menangani ini dengan menampilkan pesan kesalahan atau mengarahkan ke halaman lain
                // Contoh:
                $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
                redirect('home');
            }
        } else {
            // Pengguna belum login dengan role_id 2, arahkan mereka ke halaman login_user
            redirect('login_user'); // Gantilah 'login_user' dengan URL sesuai dengan halaman login Anda
        }
    }



    public function get_total()
    {
        $total = $this->m_setting->calculate_total(); // Gantilah your_model_name dengan nama model yang Anda gunakan

        // Menyusun data dalam format JSON
        $response = array(
            'total' => $total
        );

        // Mengirimkan response dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }



    public function get_total_items()
    {
        $total_items = $this->cart->total_items();
        echo json_encode($total_items);
    }
    public function update_qty()
    {
        // Ambil data yang dikirim melalui permintaan Ajax
        $row_id = $this->input->post('row_id');
        $new_qty = $this->input->post('new_qty');

        // Cek apakah produk dengan row_id tersebut ada dalam keranjang
        $item = $this->cart->get_item($row_id);

        if ($item) {
            // Perbarui jumlah produk
            $data = array(
                'rowid' => $row_id,
                'qty'   => $new_qty
            );
            $this->cart->update($data);

            // Hitung ulang total harga dan berat produk yang diperbarui
            $total_harga = $item['price'] * $new_qty;
            $total_berat = $item['options']['berat'] * $new_qty;

            // Kembalikan respons dalam format JSON
            $response = array(
                'total_harga' => number_format($total_harga, 2),
                'total_berat' => $total_berat
            );
            echo json_encode($response);
        } else {
            // Produk tidak ditemukan, kembalikan pesan kesalahan
            echo json_encode(array('error' => 'Produk tidak ditemukan.'));
        }
    }


    public function hapus($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }


    public function checkout()
    {
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('exspedisi', 'Exspedisi', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('paket', 'Paket', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == false) {

            $produk = $this->m_produk->getDataproduk();
            $DATA = array('produk' => $produk);
            $this->load->view('home/header');
            $this->load->view('home/navbar');
            $this->load->view('homecheckout/content', $DATA);
            $this->load->view('home/footer');
        } else {
            $data = array(
                'id' => $this->session->userdata('id'),
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'hp_penerima' => $this->input->post('hp_penerima'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kode_pos' => $this->input->post('kode_pos'),
                'exspedisi' => $this->input->post('exspedisi'),
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat'),
                'grand_total' => $this->input->post('grand_total'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => '0',
                'status_order' => '0',

            );
            $this->m_transaksi1->simpan_transaksi($data);
            // simpan tbl_rinci
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_produk' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->m_transaksi1->simpan_rinci_transaksi($data_rinci);
            }

            $this->session->set_flashdata('pesan', 'Pesan Berhasil Diperoses !!!');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
}
