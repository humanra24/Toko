<?php

class Pengguna_model extends CI_model
{
    public function getAllPengguna()
    {
        return $this->db->query("SELECT *, CASE WHEN jk='L' THEN 'Laki-Laki' WHEN jk='P' THEN 'Perempuan' END AS jk FROM `pengguna` WHERE golongan = 'kasir'")->result_array();
    }
    public function getAdmin($id)
    {
        return $this->db->get_where('pengguna', ['id_pengguna' => $id])->row_array();
    }

    public function tambahDataPengguna()
    {
        $data = [
            "id_pengguna" => $this->input->post('', true),
            "nama_pengguna" => $this->input->post('nama', true),
            "jk" => $this->input->post('jk', true),
            "no_telp" => $this->input->post('notelp', true),
            "alamat" => $this->input->post('alamat', true),
            "username" => $this->input->post('username', true),
            "password" => MD5($this->input->post('password', true)),
            "golongan" => $this->input->post('golongan', true)
        ];

        $this->db->insert('pengguna', $data);
    }

    public function hapusDataPengguna($id)
    {
        // $this->db->where('id_pengguna', $id);
        $this->db->delete('pengguna', ['id_pengguna' => $id]);
    }

    public function getPenggunaById($id)
    {
        return $this->db->get_where('pengguna', ['id_pengguna' => $id])->row_array();
    }

    public function ubahDataPengguna()
    {
        $data = [
            "nama_pengguna" => $this->input->post('nama', true),
            "jk" => $this->input->post('jk', true),
            "no_telp" => $this->input->post('notelp', true),
            "alamat" => $this->input->post('alamat', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "golongan" => $this->input->post('golongan', true)
        ];
        $this->db->where('id_pengguna',$this->input->post('id'));
        $this->db->update('pengguna', $data);
    }
    public function ceknama()
    {
        return $this->db->query("SELECT * FROM pengguna where nama_pengguna='".$this->input->post('nama')."'")->num_rows();
    }
    public function cekjk()
    {
        return $this->db->query("SELECT * FROM pengguna where jk='".$this->input->post('jk')."'")->num_rows();
    }
    public function cektelp()
    {
        return $this->db->query("SELECT * FROM pengguna where no_telp='".$this->input->post('notelp')."'")->num_rows();
    }
    public function cekalm()
    {
        return $this->db->query("SELECT * FROM pengguna where alamat='".$this->input->post('alamat')."'")->num_rows();
    }
    public function cekuser()
    {
        return $this->db->query("SELECT * FROM pengguna where username='".$this->input->post('username')."'")->num_rows();
    }
    public function cekpass()
    {
        return $this->db->query("SELECT * FROM pengguna where password='".$this->input->post('password')."'")->num_rows();
    }
}
