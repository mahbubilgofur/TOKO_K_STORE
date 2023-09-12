<?php

class m_transaksi extends CI_Model
{
	public function getDatatransaksi()
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$query = $this->db->get();
		return $query->result();
	}

	public function InsertDatatransaksi($data)
	{
		$this->db->insert('tbl_transaksi', $data);
	}

	public function UpdateDatatransaksi($data, $id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('tbl_transaksi', $data);
	}

	public function getDatatransaksiDetail($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$query = $this->db->get('tbl_transaksi');
		return $query->row();
	}

	public function DeleteDatatransaksi($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('tbl_transaksi');
	}
	public function generate_produk_id()
	{
		$latest_id = $this->get_latest_produk_id();
		if ($latest_id) {
			$numeric_part = intval(substr($latest_id, 2)) + 1;
			$new_id = 'PR' . str_pad($numeric_part, 4, '0', STR_PAD_LEFT);
		} else {
			$new_id = 'PR0001';
		}
		return $new_id;
	}
}
