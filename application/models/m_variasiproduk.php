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
}
