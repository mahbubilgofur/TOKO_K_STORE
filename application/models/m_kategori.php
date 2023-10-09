<?php

class M_kategori extends CI_Model
{
    public function getDatakategori()
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDatakategori($data)
    {
        $this->db->insert('tbl_kategori', $data);
    }

    public function UpdateDatakategori($data, $id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('tbl_kategori', $data);
    }

    public function getDatakategoriDetail($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get('tbl_kategori');
        return $query->row();
    }

    public function DeleteDatakategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('tbl_kategori');
    }
    public function getdatakategori1()
    {
        $this->db->select('RIGHT(tbl_kategori.id_kategori,5) as id_kategori', FALSE);
        $this->db->order_by('id_kategori', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_kategori');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_kategori) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "S" . $batas;
        return $kodetampil;
    }
    public function searchKategoriByNama($nama)
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->like('LOWER(nama)', strtolower($nama)); // Perbandingan case-insensitive
        $query = $this->db->get();
        return $query->result();
    }
}
