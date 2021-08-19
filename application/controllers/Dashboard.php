<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');

        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
        
        if($this->session->userdata('level') != "Admin"){
			redirect('penjualan');
		}

    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['penTrakhir'] = $this->Dashboard_model->getPenTerakhir();
        $data['stokMasukTerakhir'] = $this->Dashboard_model->stokMasukTerakhir();
        $data['stokKeluarTerakhir'] = $this->Dashboard_model->stokKeluarTerakhir();

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
