<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
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
        $data['judul'] = 'Daftar Barang';
        $data['barang'] = $this->Barang_model->getAllBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Barang'; 

        $this->form_validation->set_rules('kode','Kode', 'required|max_length[30]');
        $this->form_validation->set_rules('nama','Nama Barang', 'required|max_length[30]');
        $this->form_validation->set_rules('hb','Harga Beli', 'required|numeric');
        $this->form_validation->set_rules('hj','Harga Jual', 'required|numeric');
        $this->form_validation->set_rules('stok','Stok', 'required|max_length[11]|numeric');

        $cekkode =  $this->Barang_model->cekkode();
        $ceknama =  $this->Barang_model->ceknama();

        if ($this->form_validation->run() == FALSE) {
            if (isset($_POST['kode']) == !null || isset($data['nama']) == !null || isset($data['hb']) == !null || isset($data['hj']) == !null || isset($data['stok']) == !null)
            {
                $data['cekkode'] = $cekkode>0;
                $data['ceknama'] = $ceknama>0;
                $data['kode'] = $_POST['kode'];
                $data['nama'] = $_POST['nama'];
                $data['hb'] = $_POST['hb'];
                $data['hj'] = $_POST['hj'];
                $data['stok'] = $_POST['stok'];
            
                $this->load->view('templates/header', $data);
                $this->load->view('barang/tambah',$data);
                $this->load->view('templates/footer');
            }else{
                $data['cekkode'] = $cekkode>0;
                $data['ceknama'] = $ceknama>0;
                $data['kode'] = '';
                $data['nama'] = '';
                $data['hb'] = '';
                $data['hj'] = '';
                $data['stok'] = '';
                $this->load->view('templates/header', $data);
                $this->load->view('barang/tambah',$data);
                $this->load->view('templates/footer');
            }
        }elseif ($cekkode>0) {
            $data['ada'] = 'Kode Barang Sudah Ada';
            $data['cekkode'] = $cekkode>0;
            $data['ceknama'] = $ceknama>0;
            $data['kode'] = $_POST['kode'];
            $data['nama'] = $_POST['nama'];
            $data['hb'] = $_POST['hb'];
            $data['hj'] = $_POST['hj'];
            $data['stok'] = $_POST['stok'];
            $this->load->view('templates/header', $data);
            $this->load->view('barang/tambah',$data);
            $this->load->view('templates/footer');
        } else {
            $this->Barang_model->tambahDataBarang();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->session->set_flashdata('siapa', 'barang');
            redirect('barang');
        }        
    }

    public function hapus($id)
    {
        $this->Barang_model->hapusDataBarang($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        $this->session->set_flashdata('siapa', 'barang');
        redirect('barang');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Ubah Barang'; 
        
        $this->form_validation->set_rules('kode','Kode', 'required|max_length[30]');
        $this->form_validation->set_rules('nama','Nama Barang', 'required|max_length[30]');
        $this->form_validation->set_rules('hb','Harga Beli', 'required|numeric');
        $this->form_validation->set_rules('hj','Harga Jual', 'required|numeric');
        $this->form_validation->set_rules('stok','Stok', 'required|max_length[11]|numeric');

        $cekkode =  $this->Barang_model->cekkode();
        $ceknama =  $this->Barang_model->ceknama();
        $cekhb =  $this->Barang_model->cekhb();
        $cekhj =  $this->Barang_model->cekhj();
        $cekstok =  $this->Barang_model->cekstok();

        if ($this->form_validation->run() == FALSE) {
            $data['barang'] = $this->Barang_model->getBarangById($id);
            $this->load->view('templates/header', $data);
            $this->load->view('barang/ubah',$data);
            $this->load->view('templates/footer');
        }else {
            $this->Barang_model->ubahDataBarang();
            $this->session->set_flashdata('flash', 'Diubah');
            $this->session->set_flashdata('siapa', 'barang');
            redirect('barang');
        }                
    }
}
