<?php

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Penjualan_model');
        $this->load->library('form_validation');

        if($this->session->userdata('status') != "login"){
			redirect('login');
        }
        if($this->session->userdata('level') != "Admin"){
			redirect('dashboard');
		}
    }

    public function index()
    {
        $data['judul'] = 'Penjualan';
        $data['penjualan'] = $this->Penjualan_model->getAllPenjualan();
        $data['no'] = $this->Penjualan_model->getNoPenjualan();
        $data['tot'] = $this->Penjualan_model->getTot();
        $data['barang'] = $this->Penjualan_model->getAllBarang();

        if ($this->input->post('kodePil') == null) {
            $data['kodePil'] = null;
        } else {
            $data['kodePil'] = $this->input->post('kodePil');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $cekkode =  $this->Penjualan_model->cekkode();

        $jml = $this->input->post('jml',true);

        if ($jml > 0) {
            if ($cekkode == 0) {
                $this->session->set_flashdata('flash', 'Data Barang Tidak Ada');
                $this->session->set_flashdata('warna', 'danger');
                redirect('Penjualan');
            } else {
                $this->Penjualan_model->tambahDataDetailPenjualan();
                redirect('Penjualan');
            }
        }else{
                $this->session->set_flashdata('flash', 'jumlah barang harus > 0');
                $this->session->set_flashdata('warna', 'warning');
                redirect('Penjualan');
        }
        
    }

    public function tambahPenjualan()
    {
        $bayar = $this->input->post('bayar', true);
        $total = $this->input->post('total', true);

        if ($bayar < $total) {
            $this->session->set_flashdata('flash', 'Pembayaran Kurang');
            $this->session->set_flashdata('warna', 'warning');
            redirect('Penjualan');
        } elseif ($total == '0000') {
            $this->session->set_flashdata('flash', 'Belum Ada Transaksi');
            $this->session->set_flashdata('warna', 'warning');
            redirect('Penjualan');
        } else {
            $this->Penjualan_model->tambahDataPenjualan();
            redirect('Penjualan');
        }
    }

    public function hapus($id)
    {
        $this->Penjualan_model->hapusDataPenjualan($id);
        $this->session->set_flashdata('flash', 'Data Belanja Dihapus');
        $this->session->set_flashdata('warna', 'danger');
        redirect('Penjualan');
    }

    public function cetak()
    {
        $data['judul'] = 'cetak';
        $data['penjualan'] = $this->Penjualan_model->getAllPenjualan();
        $data['no'] = $this->Penjualan_model->getNoPenjualan();
        $data['tot'] = $this->Penjualan_model->getTot();
        $data['bayar'] = $this->input->post('bayar2', true);
        $tot = $this->input->post('total2', true);
        $bay = $this->input->post('bayar2', true);
        
            $this->load->view('penjualan/cetak', $data);
    }
}
