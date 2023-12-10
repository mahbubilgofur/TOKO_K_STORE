<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pencarian extends CI_Model
{
    public function cari_produk($keywords)
    {
        $this->db->select('p.*, k.id_kategori, k.nama as nama_kategori');
        $this->db->from('tbl_produk as p');

        // Mencari produk berdasarkan nama produk atau nama kategori
        $this->db->group_start();
        foreach ($keywords as $keyword) {
            $this->db->or_like('LOWER(p.nama)', strtolower($keyword));
            $this->db->or_like('LOWER(k.nama)', strtolower($keyword));
        }
        $this->db->group_end();

        // Gabungkan tabel kategori menggunakan LEFT JOIN
        $this->db->join('tbl_kategori as k', 'p.id_kategori = k.id_kategori', 'left');

        return $this->db->get()->result();
    }


    private function getKategoriIdsByNama($keywords)
    {
        $kategori_ids = array();

        foreach ($keywords as $keyword) {
            $this->db->select('id_kategori');
            $this->db->from('tbl_kategori');
            $this->db->where('LOWER(nama)', strtolower($keyword));

            $kategori = $this->db->get()->row();

            if ($kategori !== null) {
                $kategori_ids[] = $kategori->id_kategori;

                // Mencari subkategori
                $subkategori_ids = $this->getSubkategoriIds($kategori->id_kategori);
                $kategori_ids = array_merge($kategori_ids, $subkategori_ids);
            }
        }

        return $kategori_ids;
    }

    private function getSubkategoriIds($id_kategori)
    {
        $subkategori_ids = array();

        // Mencari subkategori berdasarkan id_kategori
        $subkategoris = $this->db->get_where('tbl_kategori', array('induk_id' => $id_kategori))->result();

        foreach ($subkategoris as $subkategori) {
            $subkategori_ids[] = $subkategori->id_kategori;

            // Rekursif mencari subkategori dari subkategori
            $subkategori_ids = array_merge($subkategori_ids, $this->getSubkategoriIds($subkategori->id_kategori));
        }

        return $subkategori_ids;
    }
}
