<?php

class Login_model extends CI_Model
{
    
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function cekLevel($table, $where)
    {
        $lev = $this->db->get_where($table, $where)->row_array();
        $level = $lev['golongan'];
        return $level;
    }
    function ceknama($table, $where)
    {
        $lev = $this->db->get_where($table, $where)->row_array();
        $name = $lev['nama'];
        return $name;
    }

}
