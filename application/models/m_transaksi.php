<?php

class M_transaksi extends CI_Model
{
	public function getDatatransaksi()
	{
		$this->db->select('tbl_transaksi.*, tbl_user.nama as nama_user, tbl_produk.nama as nama_produk');
		$this->db->from('tbl_transaksi');
		$this->db->join('tbl_user', 'tbl_transaksi.id_user = tbl_user.id');
		$this->db->join('tbl_produk', 'tbl_transaksi.id_produk = tbl_produk.id_produk');
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
	public function get_idtransaksi()
	{
		$this->db->select_max('id_transaksi');
		$query = $this->db->get('tbl_transaksi'); // Ganti 'nama_tabel' dengan nama tabel Anda

		$row = $query->row();
		$current_id_transaksi = $row->id_transaksi;

		if ($current_id_transaksi === null) {
			return '0001';
		} else {
			$next_id_transaksi = str_pad($current_id_transaksi + 1, 4, '0', STR_PAD_LEFT);
			return $next_id_transaksi;
		}
	}
	public function getuser()
	{
		$this->db->select('id, nama');
		$this->db->from('tbl_user');
		$query = $this->db->get();
		return $query->result();
	}
	public function getproduk()
	{
		$this->db->select('id_produk, nama');
		$this->db->select('id_produk, harga');
		$this->db->from('tbl_produk');
		$query = $this->db->get();
		return $query->result();
	}
}
