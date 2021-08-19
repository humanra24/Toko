<?php

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
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
        $data['supplier'] = '';
        $data['judul'] = 'Daftar Supplier';        
        $data['supplier'] = $this->Supplier_model->getAllSupplier(); 
        $this->load->view('templates/header', $data);
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Supplier'; 
        
        $this->form_validation->set_rules('nama','Nama', 'required|max_length[30]');
        $this->form_validation->set_rules('notelp','No Telpon', 'required|numeric|max_length[15]');
        $this->form_validation->set_rules('alamat','Alamat', 'required|max_length[100]');

        $ceknama =  $this->Supplier_model->ceknama();
        $cektelp =  $this->Supplier_model->cektelp();
        $cekamt =  $this->Supplier_model->cekamt();

        if ($this->form_validation->run() == FALSE) {
            if (isset($_POST['nama']) == !null || isset($data['notelp']) == !null ||  isset($data['alamat']) == !null) {

                $data['nama'] = $_POST['nama'];
                $data['notelp'] = $_POST['notelp'];
                $data['alamat'] = $_POST['alamat'];

                $data['ceknama'] = $ceknama>0;
                $data['cektelp'] = $cektelp>0;
            
                $this->load->view('templates/header', $data);
                $this->load->view('supplier/tambah',$data);
                $this->load->view('templates/footer');
            }else{
                $data['ceknama'] = $ceknama>0;
                $data['cektelp'] = $cektelp>0;
                $data['nama'] = '';
                $data['notelp'] = '';
                $data['alamat'] = '';
                $this->load->view('templates/header', $data);
                $this->load->view('supplier/tambah',$data);
                $this->load->view('templates/footer');
            }
        }elseif($ceknama>0 || $cektelp>0){
            $data['ada'] = 'Data Sudah Ada';
            $data['ceknama'] = $ceknama>0;
            $data['cektelp'] = $cektelp>0;
            $data['nama'] = $_POST['nama'];
            $data['notelp'] = $_POST['notelp'];
            $data['alamat'] = $_POST['alamat'];
            $this->load->view('templates/header', $data);
            $this->load->view('supplier/tambah',$data);
            $this->load->view('templates/footer');
        } else {
            $this->Supplier_model->tambahDataSupplier();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->session->set_flashdata('siapa', 'Supplier');
            redirect('supplier');
        }        
    }

    public function hapus($id)
    {
        $this->Supplier_model->hapusDataSupplier($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        $this->session->set_flashdata('siapa', 'supplier');
        redirect('supplier');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Ubah Supplier'; 
        
        $this->form_validation->set_rules('nama','Nama', 'required|max_length[30]');
        $this->form_validation->set_rules('notelp','No Telpon', 'required|numeric|max_length[15]');
        $this->form_validation->set_rules('alamat','Alamat', 'required|max_length[100]');

        $ceknama =  $this->Supplier_model->ceknama();
        $cektelp =  $this->Supplier_model->cektelp();
        $cekamt =  $this->Supplier_model->cekamt();

        if ($this->form_validation->run() == FALSE) {
            $data['supplier'] = $this->Supplier_model->getSupplierById($id);

            $data['nama'] = $ceknama>0;
            $data['telp'] = $cektelp>0;

            $this->load->view('templates/header', $data);
            $this->load->view('supplier/ubah',$data);
            $this->load->view('templates/footer');
        }else {
            $this->Supplier_model->ubahDataSupplier();
            $this->session->set_flashdata('flash', 'Diubah');
            $this->session->set_flashdata('siapa', 'supplier');
            redirect('supplier');
        }        
    }
}
