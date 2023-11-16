<?php

class M_variasiproduk extends CI_Model
{
    public function getDatavariasiproduk()
    {
        $this->db->select('tbl_variasiproduk.*, tbl_produk.nama as nama_produk');
        $this->db->from('tbl_variasiproduk', 'tbl_produk');
        $this->db->join('tbl_produk', 'tbl_variasiproduk.id_produk = tbl_produk.id_produk');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDatavariasiproduk($data)
    {
        $this->db->insert('tbl_variasiproduk', $data);
        // Mengembalikan ID variasiproduk yang baru saja dimasukkan
        return $this->db->insert_id();
    }
    public function InsertDetailvariasi($data)
    {
        $this->db->insert('tbl_detailvariasi', $data);

        // Tidak perlu mengembalikan ID karena kolom ID auto-increment
    }

    public function UpdateDatavariasiproduk($data, $id_variasiproduk)
    {
        $this->db->where('id_variasiproduk', $id_variasiproduk);
        $this->db->update('tbl_variasiproduk', $data);
    }

    public function getDatavariasiprodukDetail($id_variasiproduk)
    {
        $this->db->where('id_variasiproduk', $id_variasiproduk);
        $query = $this->db->get('tbl_variasiproduk');
        return $query->row();
    }

    public function DeleteDatavariasiproduk($id_variasiproduk)
    {
        $this->db->where('id_variasiproduk', $id_variasiproduk);
        $this->db->delete('tbl_variasiproduk');
    }
    public function getDatavariasiproduk1()
    {
        $this->db->select('MAX(RIGHT(tbl_variasiproduk.id_variasiproduk, 5)) as max_id', FALSE);
        $query = $this->db->get('tbl_variasiproduk');
        $result = $query->row();

        if ($result->max_id !== null) {
            $next_id = intval($result->max_id) + 1;
        } else {
            $next_id = 1;
        }

        $formatted_id = 'VAR' . str_pad($next_id, 5, "0", STR_PAD_LEFT);
        return $formatted_id;
    }

    public function get_last_variasi_id()
    {
        $this->db->select_max('id_variasiproduk');
        $query = $this->db->get('tbl_variasiproduk');

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id_variasiproduk;
        } else {
            return 0;
        }
    }

    public function data_produk()
    {
        $this->db->select('id_produk,nama as nama, gambar1,gambar2,gambar3,gambar4,gambar5');
        $this->db->from('tbl_produk');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_produk()
    {
        return $this->db->get('tbl_produk')->result();
    }
    public function insert_variasi_produk($data_variasi)
    {
        $this->db->insert('tbl_variasiproduk', $data_variasi);
    }
    public function insert_batch_variasi_produk($data)
    {
        $this->db->insert_batch('tbl_variasiproduk', $data);
    }
    public function update_gambar_variasi($id_variasiproduk, $nama_gambar)
    {
        $this->db->where('id_variasiproduk', $id_variasiproduk);
        $this->db->update('tbl_variasi_produk', array('gambar' => $nama_gambar));
    }
    public function getGambarProdukById($id_produk, $gambar_terpilih)
    {
        // Mengambil nama gambar produk berdasarkan ID dari tabel tbl_produk
        $this->db->select($gambar_terpilih); // Gunakan parameter yang diberikan (gambar1, gambar2, gambar3, dll.)
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('tbl_produk');

        if ($query->num_rows() > 0) {
            return $query->row()->$gambar_terpilih;
        } else {
            return NULL;
        }
    }
    public function get_variasi_produk_by_id_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        return $this->db->get('tbl_variasiproduk')->result();
    }

    public function get_warna_produk_by_id_produk($id_produk)
    {
        $this->db->distinct();
        $this->db->select('warna');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get('tbl_variasiproduk')->result();
    }

    public function get_stok($warna, $ukuran)
    {
        // Gantilah 'tbl_variasiproduk' sesuai dengan nama tabel Anda
        $this->db->select('stok');
        $this->db->where('warna', $warna);
        $this->db->where('ukuran', $ukuran);
        $query = $this->db->get('tbl_variasiproduk');

        // Jika data ditemukan, kembalikan stok
        if ($query->num_rows() > 0) {
            return $query->row()->stok;
        }

        // Jika tidak ada data, kembalikan 0 (atau nilai yang sesuai)
        return 0;
    }
}
