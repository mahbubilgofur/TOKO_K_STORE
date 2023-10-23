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
}
