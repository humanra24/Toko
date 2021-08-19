<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('Penjualan_model');

        $this->load->library('form_validation');
        
        if($this->session->userdata('status') != "login"){
			redirect('login');
        }
        
        if($this->session->userdata('level') != "Admin"){
			redirect('penjualan');
		}
    }

    //PENJUALAN

    public function penjualan()
    {
        $data['judul'] = 'Laporan Penjualan';
        $data['laporan'] = $this->Laporan_model->tampillaporan();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/penjualan/index', $data);
        $this->load->view('templates/footer');
    }

    public function det_lap_pen()
    {
        $data['judul'] = 'Laporan Penjualan';
        $data['laporan'] = $this->Laporan_model->det_penj();
        $data['nota'] = $this->input->post('id');
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/penjualan/det_penj', $data);
        $this->load->view('templates/footer');
    }

    public function cekTgl()
    {
        $data['dari'] = $this->input->post('tglDari',true);
        $data['sampai'] = $this->input->post('tglSampai',true);

        $data['judul'] = 'Laporan Penjualan';
        $data['laporan'] = $this->Laporan_model->tampilTgl();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/penjualan/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        $data['dari'] = $this->input->post('tglDari',true);
        $data['sampai'] = $this->input->post('tglSampai',true);
        $data['judul'] = 'Laporan Penjualan';
        $data['laporan'] = $this->Laporan_model->tampilTgl();
        $this->load->view('laporan/penjualan/cetak', $data);
    }

    public function cetak_det()
    {
        $data['judul'] = 'struk';
        $data['penjualan'] = $this->Laporan_model->cetak_det();
        $this->load->view('Laporan/penjualan/cetak_det', $data);
    }

    //STOK Masuk
    public function stokMasuk()
    {
        $data['judul'] = 'Laporan Stok Masuk';
        $data['laporan'] = $this->Laporan_model->stokMasuk();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/stok/nav', $data);
        $this->load->view('laporan/stok/masuk/masuk', $data);
        $this->load->view('templates/footer');
    }

    public function cekTglMasuk()
    {
        $data['dari'] = $this->input->post('tglDari',true);
        $data['sampai'] = $this->input->post('tglSampai',true);

        $data['judul'] = 'Laporan Stok Masuk';
        $data['laporan'] = $this->Laporan_model->tampilTglMasuk();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/stok/nav', $data);
        $this->load->view('laporan/stok/masuk/masuk', $data);
        $this->load->view('templates/footer');
    }

    public function det_masuk()
    {
        $data['judul'] = 'Detail Stok Masuk';
        $data['laporan'] = $this->Laporan_model->detMasuk();
        $data['laporan1'] = $this->Laporan_model->detMasuk1();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/stok/masuk/det_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function cetakMasuk()
    {
        $data['judul'] = 'Cetak Stok Masuk';
        $data['laporan'] = $this->Laporan_model->detMasuk();
        $data['laporan1'] = $this->Laporan_model->detMasuk1();
        $this->load->view('laporan/stok/cetak/masuk', $data);
    }

    public function cetakAllMasuk()
    {
        $data['dari'] = $this->input->post('tglDari',true);
        $data['sampai'] = $this->input->post('tglSampai',true);

        $data['judul'] = 'Cetak Stok Masuk';
        $data['laporan'] = $this->Laporan_model->tampilTglMasuk();
        $this->load->view('laporan/stok/cetak/All_masuk', $data);
    }

    // STOK KELUAR
    public function stokKeluar()
    {
        $data['judul'] = 'Laporan Stok Keluar';
        $data['laporan'] = $this->Laporan_model->stokKeluar();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/stok/nav', $data);
        $this->load->view('laporan/stok/keluar/keluar', $data);
        $this->load->view('templates/footer');
    }

    public function cekTglKeluar()
    {
        $data['dari'] = $this->input->post('tglDari',true);
        $data['sampai'] = $this->input->post('tglSampai',true);

        $data['judul'] = 'Laporan Stok Keluar';
        $data['laporan'] = $this->Laporan_model->tampilTglKeluar();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/stok/nav', $data);
        $this->load->view('laporan/stok/keluar/keluar', $data);
        $this->load->view('templates/footer');
    }

    public function det_Keluar()
    {
        $data['judul'] = 'Detail Stok Keluar';
        $data['laporan'] = $this->Laporan_model->detKeluar();
        $data['laporan1'] = $this->Laporan_model->detKeluar1();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/stok/keluar/det_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function cetakKeluar()
    {
        $data['judul'] = 'Cetak Stok Keluar';
        $data['laporan'] = $this->Laporan_model->detKeluar();
        $data['laporan1'] = $this->Laporan_model->detKeluar1();
        $this->load->view('laporan/stok/cetak/keluar', $data);
    }

    public function cetakAllKeluar()
    {
        $data['dari'] = $this->input->post('tglDari',true);
        $data['sampai'] = $this->input->post('tglSampai',true);

        $data['judul'] = 'Cetak Stok Keluar';
        $data['laporan'] = $this->Laporan_model->tampilTglKeluar();
        $this->load->view('laporan/stok/cetak/All_Keluar', $data);
    }
}
