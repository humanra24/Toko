<?php

class Laporan_model extends CI_model
{
    public function tampilLaporan()
    {
        $this->db->select('*');
        $this->db->from('penjualan j');
        $this->db->join('pengguna p', 'j.id_pengguna =p.id_pengguna');
        return $this->db->get()->result_array();
    }

    public function tampilTgl()
    {
        $a = $this->input->post('tglDari', true);
        $b = $this->input->post('tglSampai', true);
        if ($a == null || $b == null) {
            $this->db->select('*');
            $this->db->from('penjualan j');
            $this->db->join('pengguna p', 'j.id_pengguna =p.id_pengguna');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('penjualan j');
            $this->db->join('pengguna p', 'j.id_pengguna =p.id_pengguna');
            $this->db->where('j.tgl_penjualan >=', $a);
            $this->db->where('j.tgl_penjualan <=', $b);
            return $this->db->get()->result_array();
        }
    }

    public function det_penj()
    {
        $id = $this->input->post('id',true);

        $this->db->select('*');
        $this->db->from('penjualan j');
        $this->db->join('detail_penjualan d', 'd.id_penjualan = j.id_penjualan');
        $this->db->join('barang b', 'b.id_barang = d.id_barang');
        $this->db->where('j.id_penjualan', $id);
        return $this->db->get()->result_array();
    }

    public function cetak_det()
    {
        $id = $this->input->post('id',true);

        $this->db->select('*, (d.jml_barang * b.harga_jual) AS subTot');
        $this->db->from('penjualan j');
        $this->db->join('detail_penjualan d', 'j.id_penjualan =d.id_penjualan');
        $this->db->join('barang b', 'b.id_barang = d.id_barang');
        $this->db->where('j.id_penjualan', $id);
        return $this->db->get()->result_array();
    }

    // STOK MASUK

    public function stokMasuk()
    {
        $data = $this->db->query("SELECT *  FROM stok s JOIN barang b ON s.id_barang = b.id_barang JOIN pengguna p ON s.id_pengguna = p.id_pengguna JOIN supplier sp ON s.id_supplier = sp.id_supplier  WHERE s.status = 'masuk' GROUP BY s.tgl, s.id_supplier HAVING COUNT(s.tgl)  >= 1 and COUNT(s.id_supplier) >= 1");
        return $data->result_array();
    }

    public function tampilTglMasuk()
    {
        $a = $this->input->post('tglDari', true);
        $b = $this->input->post('tglSampai', true);

        if ($a == null || $b == null) {
            $data = $this->db->query("SELECT *  FROM stok s JOIN barang b ON s.id_barang = b.id_barang JOIN pengguna p ON s.id_pengguna = p.id_pengguna JOIN supplier sp ON s.id_supplier = sp.id_supplier  WHERE s.status = 'masuk' GROUP BY s.tgl, s.id_supplier HAVING COUNT(s.tgl)  >= 1 and COUNT(s.id_supplier) >= 1");
            return $data->result_array();
        } else {
            $data = $this->db->query("SELECT *  FROM stok s JOIN barang b ON s.id_barang = b.id_barang JOIN pengguna p ON s.id_pengguna = p.id_pengguna JOIN supplier sp ON s.id_supplier = sp.id_supplier  WHERE s.status = 'masuk' AND s.tgl >= '$a' AND s.tgl <= '$b' GROUP BY s.tgl, s.id_supplier HAVING COUNT(s.tgl)  >= 1 and COUNT(s.id_supplier) >= 1");
            return $data->result_array();
        }
    }

    public function detMasuk1()
    {

        $id_sup = $this->input->post('id_sup', true);
        $tgl = $this->input->post('tgl', true);
        
        $query = $this->db->query("SELECT *  FROM stok s JOIN barang b ON s.id_barang = b.id_barang JOIN pengguna p ON s.id_pengguna = p.id_pengguna JOIN supplier sp ON s.id_supplier = sp.id_supplier  WHERE s.status = 'masuk' AND s.id_supplier = $id_sup AND s.tgl = '$tgl' GROUP BY s.tgl, s.id_supplier HAVING COUNT(s.tgl)  >= 1 and COUNT(s.id_supplier) >= 1");
        return $query->result_array();
    }

    public function detMasuk()
    {

        $id_sup = $this->input->post('id_sup', true);
        $tgl = $this->input->post('tgl', true);
        
        $this->db->select('*');
        $this->db->from('stok s');
        $this->db->join('barang b', 'b.id_barang = s.id_barang');
        $this->db->join('supplier sp', 'sp.id_supplier = s.id_supplier');
        $this->db->join('pengguna p', 'p.id_pengguna = s.id_pengguna');
        $this->db->where('s.status','masuk');
        $this->db->where('s.id_supplier', $id_sup);
        $this->db->where('s.tgl', $tgl);
        return $this->db->get()->result_array();
    }


    // STOK KELUAR

    public function stokKeluar()
    {
        $data = $this->db->query("SELECT * FROM stok s JOIN barang b ON s.id_barang = b.id_barang JOIN pengguna p ON s.id_pengguna = p.id_pengguna WHERE s.status = 'keluar' GROUP BY s.tgl HAVING COUNT(s.tgl)  >= 1");
        return $data->result_array();
    }

    public function tampilTglKeluar()
    {
        $a = $this->input->post('tglDari', true);
        $b = $this->input->post('tglSampai', true);
        if ($a == null || $b == null) {
            $data = $this->db->query("SELECT * FROM stok s JOIN barang b ON s.id_barang = b.id_barang JOIN pengguna p ON s.id_pengguna = p.id_pengguna WHERE s.status = 'keluar' GROUP BY s.tgl HAVING COUNT(s.tgl)  >= 1");
            return $data->result_array();
        }
            $data = $this->db->query("SELECT * FROM stok s JOIN barang b ON s.id_barang = b.id_barang JOIN pengguna p ON s.id_pengguna = p.id_pengguna WHERE s.status = 'keluar' AND s.tgl >= '$a' AND s.tgl <= '$b' GROUP BY s.tgl HAVING COUNT(s.tgl)  >= 1");
            return $data->result_array();
    }

    public function detKeluar1()
    {
        $tgl = $this->input->post('tgl', true);
        
        $query = $this->db->query("SELECT *  FROM stok s JOIN barang b ON s.id_barang = b.id_barang JOIN pengguna p ON s.id_pengguna = p.id_pengguna  WHERE s.status = 'keluar' AND s.tgl = '$tgl' GROUP BY s.tgl HAVING COUNT(s.tgl)  >= 1");
        return $query->result_array();
    }

    public function detKeluar()
    {
        $tgl = $this->input->post('tgl', true);
        
        $this->db->select('*');
        $this->db->from('stok s');
        $this->db->join('barang b', 'b.id_barang = s.id_barang');
        $this->db->join('pengguna p', 'p.id_pengguna = s.id_pengguna');
        $this->db->where('s.status','keluar');
        $this->db->where('s.tgl', $tgl);
        return $this->db->get()->result_array();
    }
}
