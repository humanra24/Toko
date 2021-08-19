<?php

class Stok_model extends CI_model
{

    // MASUK

    public function getAllStokMasuk()
    {
        $this->db->select('*');
        $this->db->from('stok s');
        $this->db->join('barang b', 'b.id_barang = s.id_barang');
        $this->db->join('supplier sp', 'sp.id_supplier = s.id_supplier');
        $this->db->join('pengguna p', 'p.id_pengguna = s.id_pengguna');
        $this->db->where('s.status','masuk');
        return $this->db->get()->result_array();
    }
    public function ambilBarang($id)
    {
        $kode = $this->input->post('kode', true);

        if ($id == '1') {
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->where('id_barang',$kode);
            return $this->db->get()->row_array();
        }else{
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->where('id_barang',$id);
            return $this->db->get()->row_array();
        }
    }
    public function tambahMasuk()
    {

        $user = $this->input->post('user', true);

        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username', $user);
        $id1 = $this->db->get()->row_array();
        $id = $id1['id_pengguna'];

        $data = [
            "id_barang" => $this->input->post('kode', true),
            "id_pengguna" => $id,
            "id_supplier" => $this->input->post('spl', true),
            "tgl" => date("Y-m-d"),
            "ket" => "-",
            "jml_barang" => $this->input->post('jml', true),
            "status" => 'masuk'
        ];

        $this->db->insert('stok', $data);

        $jml = $this->input->post('jml', true);

        $this->db->set('stok', "stok + '$jml'" , FALSE);
        $this->db->where('id_barang',$this->input->post('kode',true));
        $this->db->update('barang');
    }
    public function hapusDataStokMasuk($id)
    {
        // $this->db->where('id_barang', $id);
        $this->db->delete('stok', ['id_stok' => $id]);
    }

    // KELUAR
    
    public function getAllStokKeluar()
    {
        $this->db->select('*');
        $this->db->from('stok s');
        $this->db->join('barang b', 'b.id_barang = s.id_barang');
        $this->db->where('s.status','keluar');
        return $this->db->get()->result_array();
    }
    public function tambahKeluar()
    {

        $user = $this->input->post('user', true);

        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username', $user);
        $id1 = $this->db->get()->row_array();
        $id = $id1['id_pengguna'];
        
        $data = [
            "id_barang" => $this->input->post('kode', true),
            "id_pengguna" => $id,
            "ket" => $this->input->post('ket', true),
            "tgl" => date("Y-m-d"),
            "jml_barang" => $this->input->post('jml', true),
            "status" => 'keluar'
        ];

        $this->db->insert('stok', $data);

        $jml = $this->input->post('jml', true);

        $this->db->set('stok', "stok - '$jml'" , FALSE);
        $this->db->where('id_barang',$this->input->post('kode',true));
        $this->db->update('barang');
    }

}
