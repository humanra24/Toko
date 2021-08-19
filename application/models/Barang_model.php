<?php

class Barang_model extends CI_model
{
    public function getAllBarang()
    {

        return $this->db->get('barang')->result_array();
    }

    public function tambahDataBarang()
    {
        $data = [
            "id_barang" => $this->input->post('kode', true),
            "nama_barang" => $this->input->post('nama', true),
            "jenis_brg" => $this->input->post('jenis', true),
            "harga_beli" => $this->input->post('hb', true),
            "harga_jual" => $this->input->post('hj', true),
            "stok" => $this->input->post('stok', true)
        ];

        $this->db->insert('barang', $data);
    }

    public function hapusDataBarang($id)
    {
        // $this->db->where('id_barang', $id);
        $this->db->delete('barang', ['id_barang' => $id]);
    }

    public function getBarangById($id)
    {
        return $this->db->get_where('barang', ['id_barang' => $id])->row_array();
    }

    public function ubahDataBarang()
    {
        $data = [
            "id_barang" => $this->input->post('kode', true),
            "nama_barang" => $this->input->post('nama', true),
            "jenis_brg" => $this->input->post('jenis', true),
            "harga_beli" => $this->input->post('hb', true),
            "harga_jual" => $this->input->post('hj', true),
            "stok" => $this->input->post('stok', true)
        ];
        $this->db->update('barang', $data, ['id_barang' => $this->input->post('id', true)]);
    }

    public function cekkode()
    {
        return $this->db->query("SELECT * FROM barang where id_barang='" . $this->input->post('kode') . "'")->num_rows();
    }
    public function ceknama()
    {
        return $this->db->query("SELECT * FROM barang where nama_barang='" . $this->input->post('nama') . "'")->num_rows();
    }
    public function cekhb()
    {
        return $this->db->query("SELECT * FROM barang where harga_beli='" . $this->input->post('hb') . "'")->num_rows();
    }
    public function cekhj()
    {
        return $this->db->query("SELECT * FROM barang where harga_jual='" . $this->input->post('hj') . "'")->num_rows();
    }
    public function cekstok()
    {
        return $this->db->query("SELECT * FROM barang where stok='" . $this->input->post('stok') . "'")->num_rows();
    }
}
