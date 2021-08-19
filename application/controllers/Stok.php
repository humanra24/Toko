<?php

class Stok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Stok_model');
        $this->load->model('Supplier_model');
        $this->load->model('Barang_model');
        $this->load->library('form_validation');

        if($this->session->userdata('status') != "login"){
			redirect('login');
        }
        
        if($this->session->userdata('level') != "Admin"){
			redirect('penjualan');
		}
    }

    // MASUK

    public function masuk()
    {
        $data['judul'] = 'Daftar Stok Masuk';
        $data['supplier'] = $this->Supplier_model->getAllSupplier();
        $data['barang'] = $this->Barang_model->getAllBarang();
        $data['stok'] = $this->Stok_model->getAllStokMasuk();
        $this->load->view('templates/header', $data);
        $this->load->view('stok/nav', $data);
        $this->load->view('stok/masuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahMasuk()
    {
        $data['judul'] = 'tambah Stok Masuk';

        $this->form_validation->set_rules('kode', 'Kode', 'required|max_length[30]');
        $this->form_validation->set_rules('spl', 'Supplier', 'required');
        $this->form_validation->set_rules('jml', 'Jumlah', 'required|numeric|max_length[11]');

        $cekkode =  $this->Barang_model->cekkode();

        $data['hilang'] = '';

        if ($this->form_validation->run() == FALSE) {
            if (isset($_POST['nama']) == !null || isset($data['spl']) == !null || isset($data['jml']) == !null) {

                $data['kode'] = $_POST['kode'];
                $data['nama'] = $_POST['nama'];
                $data['stokb'] = $_POST['stokb'];
                $data['spl1'] = $_POST['spl'];
                $data['jml'] = $_POST['jml'];
                $data['brg'] = $_POST['nama'];
                $data['cekKode'] = $cekkode;


                $data['supplier'] = $this->Supplier_model->getAllSupplier();
                $data['barang'] = $this->Barang_model->getAllBarang();
                $data['stok'] = $this->Stok_model->getAllStokMasuk();

                $this->load->view('templates/header', $data);
                $this->load->view('stok/masuk/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $data['k'] = null;
                $data['kode'] = '';
                $data['nama'] = '';
                $data['stokb'] = '';
                $data['spl1'] = '';
                $data['jml'] = '';
                $data['brg'] = '';
                $data['supplier'] = $this->Supplier_model->getAllSupplier();
                $data['barang'] = $this->Barang_model->getAllBarang();
                $data['stok'] = $this->Stok_model->getAllStokMasuk();
                $this->load->view('templates/header', $data);
                $this->load->view('stok/masuk/tambah', $data);
                $this->load->view('templates/footer');
            }
        } elseif ($cekkode == 0) {
            $data['ada'] = 'Kode Tidak Ada';
            $data['kode'] = $_POST['kode'];
            $data['nama'] = $_POST['nama'];
            $data['spl1'] = $_POST['spl'];
            $data['jml'] = $_POST['jml'];
            $data['brg'] = $_POST['nama'];
            $data['cekKode'] = $cekkode;


            $data['supplier'] = $this->Supplier_model->getAllSupplier();
            $data['barang'] = $this->Barang_model->getAllBarang();
            $data['stok'] = $this->Stok_model->getAllStokMasuk();

            $this->load->view('templates/header', $data);
            $this->load->view('stok/masuk/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Stok_model->tambahMasuk();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->session->set_flashdata('siapa', 'Stok Masuk');
            redirect('stok/masuk');
        }
    }

    public function masukBarang($id)
    {

        $data['judul'] = 'tambah Stok Masuk';

        $this->form_validation->set_rules('kode', 'Kode', 'required|max_length[30]');
        $this->form_validation->set_rules('spl', 'Supplier', 'required');
        $this->form_validation->set_rules('jml', 'Jumlah', 'required|numeric|max_length[11]');

        if ($this->form_validation->run() == FALSE) {
            if (isset($_POST['nama']) == !null || isset($data['spl']) == !null || isset($data['notelp']) == !null ||  isset($data['alamat']) == !null) {

                $data['k'] = 'ada';
                $data['kode'] = $_POST['kode'];
                $data['nama'] = $_POST['nama'];
                $data['spl1'] = $_POST['spl'];
                $data['jml'] = $_POST['jml'];
                $data['brg'] = $_POST['nama'];

                $data['hilang'] = 'hilang';

                $data['supplier'] = $this->Supplier_model->getAllSupplier();
                $data['stok'] = $this->Stok_model->getAllStokMasuk();
                $data['judul'] = 'Tambah Stok Masuk';
                $data['brg'] = $this->Stok_model->ambilBarang($id);
                $data['barang'] = $this->Barang_model->getAllBarang();
                $this->load->view('templates/header', $data);
                $this->load->view('stok/masuk/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $data['supplier'] = $this->Supplier_model->getAllSupplier();
                $data['stok'] = $this->Stok_model->getAllStokMasuk();
                $data['judul'] = 'Tambah Stok Masuk';
                $data['brg'] = $this->Stok_model->ambilBarang($id);
                $data['barang'] = $this->Barang_model->getAllBarang();
                $data['spl1'] = '';
                $data['k'] = 'ada';
                $data['jml'] = '';

                $data['hilang'] = 'hilang';

                $this->load->view('templates/header', $data);
                $this->load->view('stok/masuk/tambah', $data);
                $this->load->view('templates/footer');
            }
        }elseif ($this->input->post('jml', true) <= 0) {
                $data['k'] = 'ada';
                $data['ada'] = 'Jumlah Stok Masuk tidak boleh < 1';
                $data['kode'] = $_POST['kode'];
                $data['nama'] = $_POST['nama'];
                $data['spl1'] = $_POST['spl'];
                $data['jml'] = $_POST['jml'];
                $data['brg'] = $_POST['nama'];

                $data['hilang'] = 'hilang';

                $data['supplier'] = $this->Supplier_model->getAllSupplier();
                $data['stok'] = $this->Stok_model->getAllStokMasuk();
                $data['judul'] = 'Tambah Stok Masuk';
                $data['brg'] = $this->Stok_model->ambilBarang($id);
                $data['barang'] = $this->Barang_model->getAllBarang();
                $this->load->view('templates/header', $data);
                $this->load->view('stok/masuk/tambah', $data);
                $this->load->view('templates/footer');
        }else {
            $this->Stok_model->tambahMasuk();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->session->set_flashdata('siapa', 'Stok Masuk');
            redirect('stok/masuk');
        }
    }

    // ubah_brg

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
            $this->load->view('stok/masuk/ubah_brg',$data);
            $this->load->view('templates/footer');
        }else {
            $this->Barang_model->ubahDataBarang();
            $this->session->set_flashdata('flash', 'Diubah');
            $this->session->set_flashdata('siapa', 'barang');
            redirect("stok/masukbarang/$id");
        }                
    }

    // KELUAR

    public function keluar()
    {
        $data['judul'] = 'Daftar Stok Keluar';
        $data['barang'] = $this->Barang_model->getAllBarang();
        $data['stok'] = $this->Stok_model->getAllStokKeluar();
        $this->load->view('templates/header', $data);
        $this->load->view('stok/nav', $data);
        $this->load->view('stok/keluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahKeluar()
    {
        $data['judul'] = 'tambah Stok Keluar';

        $this->form_validation->set_rules('kode', 'Kode', 'required|max_length[30]');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|max_length[15]');
        $this->form_validation->set_rules('jml', 'Jumlah', 'required|numeric|max_length[11]');

        $cekkode =  $this->Barang_model->cekkode();

        if ($this->form_validation->run() == FALSE) {
            if (isset($_POST['nama']) == !null || isset($data['ket']) == !null || isset($data['jml']) == !null) {

                $data['kode'] = $_POST['kode'];
                $data['nama'] = $_POST['nama'];
                $data['stokb'] = $_POST['stokb'];
                $data['jml'] = $_POST['jml'];
                $data['brg'] = $_POST['nama'];
                $data['cekKode'] = $cekkode;
                
                $data['ket1'] = '';

                $data['hilang'] = 'hilang';


                $data['supplier'] = $this->Supplier_model->getAllSupplier();
                $data['barang'] = $this->Barang_model->getAllBarang();
                $data['stok'] = $this->Stok_model->getAllStokMasuk();

                $this->load->view('templates/header', $data);
                $this->load->view('stok/keluar/kurang', $data);
                $this->load->view('templates/footer');
            } else {
                $data['k'] = null;
                $data['kode'] = '';
                $data['nama'] = '';
                $data['stokb'] = '';
                $data['ket1'] = '';
                $data['jml'] = '';
                $data['brg'] = '';
                $data['hilang'] = '';
                $data['barang'] = $this->Barang_model->getAllBarang();
                $data['stok'] = $this->Stok_model->getAllStokMasuk();
                $this->load->view('templates/header', $data);
                $this->load->view('stok/keluar/kurang', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->Stok_model->tambahKeluar();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->session->set_flashdata('siapa', 'Stok Keluar');
            redirect('stok/keluar');
        }
    }

    public function keluarBarang($id)
    {

        $data['judul'] = 'tambah Stok Keluar';        

        $brg = $this->Stok_model->ambilBarang($id);

        $data['hilang'] = 'hilang';

        $this->form_validation->set_rules('kode', 'Kode', 'required|max_length[30]');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');
        $this->form_validation->set_rules('jml', 'Jumlah', 'required|numeric|max_length[11]');

        if ($this->form_validation->run() == FALSE) {
            if (isset($_POST['nama']) == !null || isset($data['spl']) == !null || isset($data['notelp']) == !null ||  isset($data['alamat']) == !null) {

                $data['k'] = 'ada';
                $data['kode'] = $_POST['kode'];
                $data['nama'] = $_POST['nama'];
                $data['jml'] = $_POST['jml'];
                $data['ket1'] = $_POST['ket'];

                $data['stok'] = $this->Stok_model->getAllStokKeluar();
                $data['brg'] = $this->Stok_model->ambilBarang($id);
                $data['barang'] = $this->Barang_model->getAllBarang();
                $this->load->view('templates/header', $data);
                $this->load->view('stok/Keluar/kurang', $data);
                $this->load->view('templates/footer');
            } else {
                $data['supplier'] = $this->Supplier_model->getAllSupplier();
                $data['stok'] = $this->Stok_model->getAllStokMasuk();
                $data['brg'] = $this->Stok_model->ambilBarang($id);
                $data['barang'] = $this->Barang_model->getAllBarang();
                $data['k'] = 'ada';
                $data['ket1'] = '';
                $data['jml'] = '';
                
                $this->load->view('templates/header', $data);
                $this->load->view('stok/Keluar/kurang', $data);
                $this->load->view('templates/footer');
            }
        }elseif ($brg['stok'] < $this->input->post('jml', true) || $this->input->post('jml', true) <= 0) {
            $data['k'] = 'ada';
            $data['ada'] = 'Jumlah Stok Keluar Melebihi Stok Barang / Jumlah Stok Keluar Tidak Boleh Kurang Dari 1';
            $data['kode'] = $_POST['kode'];
            $data['nama'] = $_POST['nama'];
            $data['ket1'] = $_POST['ket'];
            $data['jml'] = $_POST['jml'];

            $data['stok'] = $this->Stok_model->getAllStokMasuk();
            $data['judul'] = 'Tambah Stok Keluar';
            $data['brg'] = $this->Stok_model->ambilBarang($id);
            $data['barang'] = $this->Barang_model->getAllBarang();
            $this->load->view('templates/header', $data);
            $this->load->view('stok/keluar/kurang', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Stok_model->tambahKeluar();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->session->set_flashdata('siapa', 'Stok Keluar');
            redirect('stok/keluar');
        }
    }
    public function hapusK($id)
    {
        $this->Stok_model->hapusDataStokMasuk($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        $this->session->set_flashdata('siapa', 'stok');
        redirect('stok/keluar');
    }
}
