<?php

class M_user extends CI_Model
{
    public function getDatauser()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDatauser($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    public function UpdateDatauser($data, $id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_user', $data);
    }

    public function getDatauserDetail($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tbl_user');
        return $query->row();
    }

    public function DeleteDatauser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_user');
    }
}
