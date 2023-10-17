<?php

class M_produk extends CI_Model
{
    public function getDataproduk()
    {

        $this->db->select('tbl_produk.*, tbl_kategori.nama as nama_kategori,tbl_variasiproduk.nama as nama_variasi');
        $this->db->from('tbl_produk', 'tbl_kategori', 'tbl_variasiproduk');
        $this->db->join('tbl_kategori', 'tbl_produk.id_kategori = tbl_kategori.id_kategori');
        $this->db->join('tbl_variasiproduk', 'tbl_produk.id_variasiproduk = tbl_variasiproduk.id_variasiproduk');
        $query = $this->db->get();
        return $query->result();
    }


    public function InsertDataproduk($data)
    {
        $this->db->insert('tbl_produk', $data);
    }

    public function UpdateDataproduk($id_produk, $data)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->update('tbl_produk', $data);
    }

    public function getDataprodukDetail($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('tbl_produk');
        return $query->row();
    }

    public function DeleteDataproduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('tbl_produk');
    }
    public function getdataproduk1()
    {
        $this->db->select('RIGHT(tbl_produk.id_produk,5) as id_produk', FALSE);
        $this->db->order_by('id_produk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_produk');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_produk) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "PR" . $batas;
        return $kodetampil;
    }
    public function getKategori()
    {
        $this->db->select('id_kategori, nama');
        $this->db->from('tbl_kategori');
        $query = $this->db->get();
        return $query->result();
    }
    public function getcariKategori()
    {
        $query = $this->db->get('tbl_kategori');
        return $query->result_array();
    }
    public function getVariasi()
    {
        $this->db->select('id_variasiproduk, nama');
        $this->db->from('tbl_variasiproduk');
        $query = $this->db->get();
        return $query->result();
    }
    public function getProdukById($id_produk)
    {
        // Query database untuk mengambil data produk berdasarkan id_produk
        $query = $this->db->get_where('tbl_produk', array('id_produk' => $id_produk));

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan data produk dalam bentuk array jika ditemukan
        } else {
            return false; // Mengembalikan false jika produk tidak ditemukan
        }
    }
    public function getProdukOlahragaByIdKategori()
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->where('id_kategori', 'S00001');
        $this->db->or_where('LOWER(id_kategori)', 'olahraga');
        $query = $this->db->get();
        return $query->result();
    }
    public function getProdukByNamaKategori($nama_kategori)
    {
        $this->db->select('tbl_produk.*'); // Mengambil semua kolom dari tbl_produk
        $this->db->from('tbl_produk');
        $this->db->join('tbl_kategori', 'tbl_produk.id_kategori = tbl_kategori.id_kategori');
        $this->db->where('LOWER(tbl_kategori.nama)', strtolower($nama_kategori)); // Ubah ke huruf kecil untuk perbandingan case-insensitive
        $query = $this->db->get();
        return $query->result();
    }


    public function searchProdukByKeyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->like('LOWER(id_kategori)', strtolower($keyword)); // Perbandingan case-insensitive
        $query = $this->db->get();
        return $query->result();
    }
    public function getProdukBy($id_produk)
    {
        // Gantilah 'tbl_produk' dengan nama tabel yang sesuai di database Anda
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('tbl_produk');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return null; // Produk tidak ditemukan
        }
    }
    public function getuser()
    {
        $this->db->select('id, nama');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDatauser($id)
    {
        $this->db->select('role_id'); // Anda hanya perlu mengambil kolom role_id
        $this->db->from('tbl_user');
        $this->db->where('id', $id); // Menggunakan ID pengguna yang sedang login
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan hasil sebagai array assosiatif
        } else {
            return false; // Pengguna dengan ID yang diberikan tidak ditemukan
        }
    }

    public function get_produk_by_kategori_hierarki($id_kategori)
    {
        // Anda perlu menggantikan 'tbl_produk' dan 'tbl_kategori' sesuai dengan nama tabel yang sesuai di basis data Anda
        $this->db->select('tbl_produk.*');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_kategori', 'tbl_produk.id_kategori = tbl_kategori.id_kategori');
        $this->db->where('tbl_kategori.id_kategori', $id_kategori);

        $query = $this->db->get();
        return $query->result();
    }
}
