<?php

class M_kasir extends CI_Model
{
    public function getdatakasir()
    {
        $this->db->select('tbl_kasirtransaksi.*, tbl_produk.nama as nama_produk,harga as hargaproduk');
        $this->db->from('tbl_kasirtransaksi', 'tbl_produk');
        $this->db->join('tbl_produk', 'tbl_kasirtransaksi.id_produk = tbl_produk.id_produk');
        $query = $this->db->get();
        return $query->result();
    }
    public function inputaddkasir($data)
    {
        $this->db->insert('tbl_kasirtransaksi', $data);
        return $this->db->insert_id();
    }
}
