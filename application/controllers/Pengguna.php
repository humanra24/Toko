<?php

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
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
        $data['judul'] = 'Daftar Kasir';
        $data['pengguna'] = $this->Pengguna_model->getAllPengguna();
        $this->load->view('templates/header', $data);
        $this->load->view('pengguna/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $data['judul'] = 'Tambah Pengguna'; 
        $data['jk'] = ['L','P']; 
        
        $this->form_validation->set_rules('nama','Nama', 'required|max_length[30]');
        $this->form_validation->set_rules('notelp','No Telpon', 'required|numeric|max_length[15]');
        $this->form_validation->set_rules('alamat','Alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('username','Username', 'required|max_length[10]');
        $this->form_validation->set_rules('password','Password', 'required|max_length[10]');

        $ceknama = $this->Pengguna_model->ceknama();
        $cektelp = $this->Pengguna_model->cektelp();
        $cekuser = $this->Pengguna_model->cekuser();

        if ($this->form_validation->run() == FALSE) {
            if (isset($_POST['nama']) == !null || isset($_POST['jk']) == !null || isset($data['notelp']) == !null || isset($data['alamat']) == !null ||  isset($data['username']) == !null || isset($data['password']) == !null) {
                $data['nama'] = $_POST['nama'];

                $data['jk1'] = 'L';
                $data['notelp'] = $_POST['notelp'];
                $data['alamat'] = $_POST['alamat'];
                $data['username'] = $_POST['username'];
                $data['password'] = $_POST['password'];    
                
                $data['ceknama'] = $ceknama>0;
                $data['cektelp'] = $cektelp>0;
                $data['cekuser'] = $cekuser>0;
            
                $this->load->view('templates/header', $data);
                $this->load->view('pengguna/tambah',$data);
                $this->load->view('templates/footer');
            }else{

                $data['ceknama'] = $ceknama>0;
                $data['cektelp'] = $cektelp>0;
                $data['cekuser'] = $cekuser>0;

                $data['nama'] = '';
                $data['jk1'] = 'L';
                $data['notelp'] = '';
                $data['alamat'] = '';
                $data['username'] = '';
                $data['password'] = '';
                $this->load->view('templates/header', $data);
                $this->load->view('pengguna/tambah',$data);
                $this->load->view('templates/footer');
            }
        } elseif ($ceknama>0||$cektelp>0||$cekuser) {
            $data['nama'] = $_POST['nama'];

            $data['jk1'] = $_POST['jk'];
            $data['notelp'] = $_POST['notelp'];
            $data['alamat'] = $_POST['alamat'];
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];     
            
            $data['ada'] = 'data sudah ada';

            $data['ceknama'] = $ceknama>0;
            $data['cektelp'] = $cektelp>0;
            $data['cekuser'] = $cekuser>0;
            
            $this->load->view('templates/header', $data);
            $this->load->view('pengguna/tambah',$data);
            $this->load->view('templates/footer');
        } else {
            $this->Pengguna_model->tambahDataPengguna();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->session->set_flashdata('siapa', 'Pengguna');
            redirect('Pengguna');
        }        
    }

    public function hapus($id)
    {
        $this->Pengguna_model->hapusDataPengguna($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        $this->session->set_flashdata('siapa', 'Pengguna');
        redirect('pengguna');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Ubah Pengguna'; 
        $data['jk'] = ['L','P'];

        $ceknama = $this->Pengguna_model->ceknama();
        $cekjk = $this->Pengguna_model->cekjk();
        $cektelp = $this->Pengguna_model->cektelp();
        $cekalm = $this->Pengguna_model->cekalm();
        $cekuser = $this->Pengguna_model->cekuser();
        $cekpass = $this->Pengguna_model->cekpass();
        
        $this->form_validation->set_rules('nama','Nama Pengguna', 'required|max_length[30]');
        $this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
        $this->form_validation->set_rules('notelp','No Telpon', 'required|numeric|max_length[15]');
        $this->form_validation->set_rules('alamat','alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('username','Username', 'required|max_length[10]|alpha');
        $this->form_validation->set_rules('password','Password', 'required|max_length[10]');

        if ($this->form_validation->run() == FALSE) {

            $data['pengguna'] = $this->Pengguna_model->getPenggunaById($id);
            $this->load->view('templates/header', $data);
            $this->load->view('Pengguna/ubah',$data);
            $this->load->view('templates/footer');
        }else {
            $this->Pengguna_model->ubahDataPengguna();
            $this->session->set_flashdata('flash', 'Diubah');
            $this->session->set_flashdata('siapa', 'Pengguna');
            redirect('Pengguna');
        }
    }

    public function editProfil($id)
    {

        $data['judul'] = 'Edit Profil';

        $data['jk'] = ['L','P'];

        $ceknama = $this->Pengguna_model->ceknama();
        $cekjk = $this->Pengguna_model->cekjk();
        $cektelp = $this->Pengguna_model->cektelp();
        $cekalm = $this->Pengguna_model->cekalm();
        $cekuser = $this->Pengguna_model->cekuser();
        $cekpass = $this->Pengguna_model->cekpass();
        
        $this->form_validation->set_rules('nama','Nama Pengguna', 'required|max_length[30]');
        $this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
        $this->form_validation->set_rules('notelp','No Telpon', 'required|numeric|max_length[15]');
        $this->form_validation->set_rules('alamat','alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('username','Username', 'required|max_length[10]|alpha');
        $this->form_validation->set_rules('password','Password', 'required|max_length[10]');

        if ($this->form_validation->run() == FALSE) {

            $data['pengguna'] = $this->Pengguna_model->getAdmin($id);
            $this->load->view('templates/header', $data);
            $this->load->view('pengguna/editProfil', $data);
            $this->load->view('templates/footer');
        }else {
            $this->Pengguna_model->ubahDataPengguna();
            $this->session->set_flashdata('flash', 'Diubah');
            $this->session->set_flashdata('siapa', 'Pengguna');
            redirect('Pengguna');
        }
    }
}
