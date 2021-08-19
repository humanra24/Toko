<?php

class Supplier_model extends CI_model
{
    
    public function getAllSupplier()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function tambahDataSupplier()
    {
        $data = [
            "id_supplier" => $this->input->post('', true),
            "nama_supplier" => $this->input->post('nama', true),
            "no_telp" => $this->input->post('notelp', true),
            "alamat" => $this->input->post('alamat', true)
        ];

        $this->db->insert('supplier', $data);
    }

    public function hapusDataSupplier($id)
    {
        // $this->db->where('id_supplier', $id);
        $this->db->delete('supplier', ['id_supplier' => $id]);
    }

    public function getSupplierById($id)
    {
        return $this->db->get_where('supplier', ['id_supplier' => $id])->row_array();
    }

    public function ubahDataSupplier()
    {
        $data = [
            "nama_supplier" => $this->input->post('nama', true),
            "no_telp" => $this->input->post('notelp', true),
            "alamat" => $this->input->post('alamat', true)
        ];
        $this->db->where('id_supplier',$this->input->post('id'));
        $this->db->update('supplier', $data);
    }
    public function ceknama()
    {
        return $this->db->query("SELECT * FROM supplier where nama_supplier='".$this->input->post('nama')."'")->num_rows();
    }
    public function cektelp()
    {
        return $this->db->query("SELECT * FROM supplier where no_telp='".$this->input->post('notelp')."'")->num_rows();
    }
    public function cekamt()
    {
        return $this->db->query("SELECT * FROM supplier where alamat='".$this->input->post('alamat')."'")->num_rows();
    }


}
