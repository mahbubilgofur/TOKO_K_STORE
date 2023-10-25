<?php

class M_setting extends CI_Model
{
    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }
    public function getProdukById($produk_id)
    {
        // Gantilah 'produk' dan 'id' dengan nama tabel dan kolom ID produk di database Anda.
        $this->db->where('id_produk', $produk_id);
        $query = $this->db->get('tbl_produk');

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return null;
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_setting', $data);
    }
    public function get_produk_by_id($produk_id)
    {
        // Fungsi ini mengambil data produk berdasarkan ID produk dari database
        $query = $this->db->get_where('produk', array('id_produk' => $produk_id));
        return $query->row(); // Mengembalikan satu baris data produk
    }

    public function detail_produk($produk_id)
    {
        // Query ke database untuk mendapatkan detail produk berdasarkan $produk_id
        $query = $this->db->get_where('tbl_produk', array('id_produk' => $produk_id));

        // Periksa apakah produk ditemukan
        if ($query->num_rows() > 0) {
            // Produk ditemukan, kembalikan data produk
            return $query->row();
        } else {
            // Produk tidak ditemukan, kembalikan null atau pesan kesalahan jika perlu
            return null;
        }
    }
}
