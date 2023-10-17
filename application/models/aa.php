<?php

class M_gambarproduk extends CI_Model
{
    public function getDatagambarproduk()
    {
        $this->db->select('*');
        $this->db->from('tbl_gambarproduk');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDatagambarproduk($data)
    {
        $this->db->insert('tbl_gambarproduk', $data);
    }

    public function UpdateDatagambarproduk($data, $id_gambarproduk)
    {
        $this->db->where('id_gambarproduk', $id_gambarproduk);
        $this->db->update('tbl_gambarproduk', $data);
    }

    public function getDatagambarprodukDetail($id_gambarproduk)
    {
        $this->db->where('id_gambarproduk', $id_gambarproduk);
        $query = $this->db->get('tbl_gambarproduk');
        return $query->row();
    }

    public function DeleteDatagambarproduk($id_gambarproduk)
    {
        $this->db->where('id_gambarproduk', $id_gambarproduk);
        $this->db->delete('tbl_gambarproduk');
    }
    public function getdatagambarproduk1()
    {
        $this->db->select('RIGHT(tbl_gambarproduk.id_gambarproduk,5) as id_gambarproduk', FALSE);
        $this->db->order_by('id_gambarproduk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_gambarproduk');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_gambarproduk) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "S" . $batas;
        return $kodetampil;
    }
}
