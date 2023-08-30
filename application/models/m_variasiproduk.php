<?php

class M_variasiproduk extends CI_Model
{
    public function getDatavariasiproduk()
    {
        $this->db->select('*');
        $this->db->from('tbl_variasiproduk');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDatavariasiproduk($data)
    {
        $this->db->insert('tbl_variasiproduk', $data);
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
}
