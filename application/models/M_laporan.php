<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model

{
    public function laporan_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_transaksi');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.no_order =tbl_rinci_transaksi.no_order', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk=tbl_rinci_transaksi.id_produk', 'left');
        $this->db->where('DAY(tbl_transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(tbl_transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
        return $this->db->get()->result();
    }
    public function laporan_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        return $this->db->get()->result();
    }
    public function laporan_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        return $this->db->get()->result();
    }
}