<?php

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    function index()
    {
        $data['judul'] = 'Login';
        $this->load->view('login/index', $data);
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => MD5($password)
        );
        $cek = $this->Login_model->cek_login("pengguna", $where)->num_rows();
        $cekLevel = $this->Login_model->cekLevel("pengguna", $where);
        $ceknama = $this->Login_model->ceknama("pengguna", $where);
        if ($cek > 0) {

            $data_session = array(
                'level' => $cekLevel,
                'nama' => $username,
                'ceknama' => $ceknama,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);

            redirect('dashboard');
        } else {
            $this->session->set_flashdata('flash', 'Username atau Password salah!');
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
