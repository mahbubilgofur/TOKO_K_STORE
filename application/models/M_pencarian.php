<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pencarian extends CI_Model
{
    // public function cari_produk($keyword)
    // {
    //     $keyword = strtolower($keyword); // Konversi kata kunci pencarian menjadi huruf kecil

    //     // Mencari produk berdasarkan nama dengan huruf kecil
    //     $this->db->like('LOWER(nama)', $keyword, 'both');

    //     // Mencari produk berdasarkan id_kategori yang cocok dengan nama kategori atau subkategori
    //     $kategori_ids = $this->getKategoriIdsByNama($keyword);

    //     // Periksa apakah $kategori_ids tidak kosong sebelum menggunakan where_in
    //     if (!empty($kategori_ids)) {
    //         $this->db->where_in('id_kategori', $kategori_ids);
    //     }

    //     return $this->db->get('tbl_produk')->result();
    // }

    // private function getKategoriIdsByNama($nama_kategori)
    // {
    //     $kategori_ids = array();

    //     // Mencari id_kategori berdasarkan nama kategori
    //     $kategori = $this->db->get_where('tbl_kategori', array('LOWER(nama)' => $nama_kategori))->row();

    //     if ($kategori) {
    //         $kategori_ids[] = $kategori->id_kategori;
    //     }

    //     // Mencari subkategori
    //     $subkategori_ids = $this->getSubkategoriIds($kategori->id_kategori);

    //     return array_merge($kategori_ids, $subkategori_ids);
    // }

    // private function getSubkategoriIds($induk_id)
    // {
    //     $subkategori_ids = array();

    //     // Mencari semua subkategori dari kategori dengan induk_id yang diberikan
    //     $subkategoris = $this->db->get_where('tbl_kategori', array('induk_id' => $induk_id))->result();

    //     foreach ($subkategoris as $subkategori) {
    //         $subkategori_ids[] = $subkategori->id_kategori;
    //         $subkategori_ids = array_merge($subkategori_ids, $this->getSubkategoriIds($subkategori->id_kategori));
    //     }

    //     return $subkategori_ids;
    // }
    public function cari_produk($keyword)
    {
        $keyword = strtolower($keyword); // Konversi kata kunci pencarian menjadi huruf kecil

        // Mencari produk berdasarkan nama dengan huruf kecil
        $this->db->like('LOWER(nama)', $keyword, 'both');

        // Mencari produk berdasarkan id_kategori yang cocok dengan nama kategori atau subkategori
        $kategori_ids = $this->getKategoriIdsByNama($keyword);

        if (!empty($kategori_ids)) {
            $this->db->where_in('id_kategori', $kategori_ids);
        } else {
            // Tidak ada kategori yang cocok, set hasil pencarian menjadi array kosong
            return array();
        }

        return $this->db->get('tbl_produk')->result();
    }

    private function getKategoriIdsByNama($nama_kategori)
    {
        $kategori_ids = array();

        // Mencari id_kategori berdasarkan nama kategori
        $kategori = $this->db->get_where('tbl_kategori', array('LOWER(nama)' => $nama_kategori))->row();

        if ($kategori !== null) {
            $kategori_ids[] = $kategori->id_kategori;

            // Mencari subkategori
            $subkategori_ids = $this->getSubkategoriIds($kategori->id_kategori);

            return array_merge($kategori_ids, $subkategori_ids);
        } else {
            // Handle jika kategori tidak ditemukan
            // Misalnya, Anda dapat mengembalikan array kosong atau pesan kesalahan
            return array();
        }
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
