<?php

class Penjualan_model extends CI_model
{
    public function getAllPenjualan()
    {
        $data = $this->db->query("SELECT max(id_penjualan) as max FROM `penjualan`")->row_array();
        $id = $data['max'];
        $id++;
        $no = sprintf($id);

        $this->db->select('*,p.id_detail_penjualan, b.nama_barang, p.jml_barang, b.harga_jual, (p.jml_barang * b.harga_jual) AS subTot');
        $this->db->from('detail_penjualan p');
        $this->db->join('barang b', 'p.id_barang = b.id_barang');
        $this->db->where('id_penjualan', $no);
        return $this->db->get()->result_array();
    }

    public function getNoPenjualan()
    {
        $data = $this->db->query("SELECT max(id_penjualan) as max FROM `penjualan`")->row_array();
        $id = $data['max'];
        $id++;
        $no = sprintf($id);
        return $no;
    }

    public function tambahDataDetailPenjualan()
    {
        $no = $this->input->post('no', true);
        $id = $this->input->post('kode', true);
        $jml = $this->input->post('jml');

        $this->db->select('*');
        $this->db->from('detail_penjualan');
        $this->db->where('id_barang', $id);
        $this->db->where('id_penjualan', $no);
        $row = $this->db->get()->num_rows();

        $this->db->query("UPDATE barang SET stok=stok - '$jml' WHERE id_barang = '$id'");

        if ($row == 1) {
            $this->db->query("UPDATE detail_penjualan SET jml_barang=jml_barang + '$jml' WHERE id_barang = '$id'");
        } else {

            $data = [
                "id_penjualan" => $no,
                "id_barang" => $id,
                "jml_barang" => $jml
            ];

            $this->db->insert('detail_penjualan', $data);
        }
    }

    public function tambahDataPenjualan()
    {
        $tot = $this->input->post('total', true);
        $user = $this->input->post('user', true);
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d H:i:s");

        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username', $user);
        $id1 = $this->db->get()->row_array();
        $id = $id1['id_pengguna'];

        $data = [
            "harga_total" => $tot,
            "tgl_penjualan" => $tgl,
            "id_pengguna" => $id
        ];

        $this->db->insert('penjualan', $data);
    }

    public function GetTot()
    {
        $data = $this->db->query("SELECT max(id_penjualan) as max FROM `penjualan`")->row_array();
        $id = $data['max'];
        $id_p = $id + 1;

        $this->db->select('p.id_detail_penjualan, b.nama_barang, p.jml_barang, b.harga_jual, (p.jml_barang * b.harga_jual) AS subTot');
        $this->db->from('detail_penjualan p');
        $this->db->join('barang b', 'p.id_barang = b.id_barang');
        $this->db->where('p.id_penjualan', $id_p);
        $data = $this->db->get()->result_array();

        $tot = '0000';

        foreach ($data as $dataa) {
            $total[] = $dataa['subTot'];
            $tot = array_sum($total);
        }
        return $tot;
    }

    public function hapusDataPenjualan($id)
    {
        $this->db->select('*');
        $this->db->from('detail_penjualan');
        $this->db->where('id_detail_penjualan', $id);
        $data = $this->db->get()->row_array();

        $id_brg = $data['id_barang'];
        $jml_brg = $data['jml_barang'];

        $this->db->where('id_barang', $id_brg);
        $this->db->query("UPDATE barang SET stok=stok + '$jml_brg' WHERE id_barang = '$id_brg'");

        
        $this->db->delete('detail_penjualan', ['id_detail_penjualan' => $id]);
    }

    public function cekKode()
    {
        return $this->db->query("SELECT * FROM barang where id_barang='" . $this->input->post('kode') . "'")->num_rows();
    }

    public function getAllBarang()
    {
        $this->db->where('stok >', '0');
        return $this->db->get('barang')->result_array();
    }
}
