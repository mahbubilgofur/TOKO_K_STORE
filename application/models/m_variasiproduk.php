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
        $this->db->select('RIGHT(tbl_variasiproduk.id_variasiproduk,5) as id_variasiproduk', FALSE);
        $this->db->order_by('id_variasiproduk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_variasiproduk');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_variasiproduk) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "VAR" . $batas;
        return $kodetampil;
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
    // Menyimpan informasi gambar 1-5 ke dalam tabel variasi_produk
    public function save_gambar_variasi($id_variasiproduk, $gambar1, $gambar2, $gambar3, $gambar4, $gambar5)
    {
        $data_gambar = array(
            'id_variasiproduk' => $id_variasiproduk,
            'gambar1' => $gambar1,
            'gambar2' => $gambar2,
            'gambar3' => $gambar3,
            'gambar4' => $gambar4,
            'gambar5' => $gambar5
        );
        $this->db->insert('tbl_variasiproduk', $data_gambar);
    }
    public function update_gambar_variasi($id_variasiproduk, $nama_gambar)
    {
        $this->db->where('id_variasiproduk', $id_variasiproduk);
        $this->db->update('tbl_variasi_produk', array('gambar' => $nama_gambar));
    }
}
