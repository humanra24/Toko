<?php

class Dashboard_model extends CI_model
{
    public function getPenTerakhir()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->where('id_penjualan IN (SELECT MAX(id_penjualan) FROM penjualan)');
        return $this->db->get()->result_array();
    }

    public function stokMasukTerakhir()
    {
        $this->db->select('*');
        $this->db->from('stok s');
        $this->db->join('barang b', 'b.id_barang = s.id_barang');
        $this->db->where('s.status','masuk');
        $this->db->order_by('s.id_stok','desc');
        $this->db->limit('1');
        return $this->db->get()->result_array();
    }

    public function stokKeluarTerakhir()
    {
        $this->db->select('*');
        $this->db->from('stok s');
        $this->db->join('barang b', 'b.id_barang = s.id_barang');
        $this->db->where('s.status','keluar');
        $this->db->order_by('s.id_stok','desc');
        $this->db->limit('1');
        return $this->db->get()->result_array();
    }
}
