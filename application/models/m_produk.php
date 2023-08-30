<?php

class M_produk extends CI_Model
{
    public function getDataproduk()
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDataproduk($data)
    {
        $this->db->insert('tbl_produk', $data);
    }

    public function UpdateDataproduk($data, $id_produk)
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
}
