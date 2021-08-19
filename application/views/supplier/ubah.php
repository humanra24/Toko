<div class="row mt-5">
    <div class="col-md-3"></div>
        <div class="col-md-6">
        
            <div class="container">
            
                <div class="flash-ada" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

                    <?php if ($this->session->flashdata('flash')) : ?>
                        <!-- <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Data supplier
                                        <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                                        <strong>berhasil</strong> <?= $this->session->flashdata('siapa'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div> -->
                    <?php endif; ?>
                

                <div class="card">
                    <div class="card-header">
                            <span style="font-size: 25px; color: Dodgerblue;">
                            <a href="<?= base_url(); ?>supplier" style="text-decoration:none"><i class="fas fa-arrow-left">
                            </i> </a>
                            </span>
                        &nbsp;
                        <span style="font-size: 25px;">
                        Ubah Supplier
                        </span>
                    </div>
                    <div class="card-body">
                    
                    <?php if (isset($ada)): ?>
                        <div class="alert alert-danger" role="alert">
                        <?= $ada; ?>
                        </div>
                    <?php endif ?>                    
                    
                            <form action="" method="post">
                            
                                <input type="hidden" name="id" id="id" value="<?=$supplier['id_supplier']; ?>">

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="nama">Nama Supplier</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control 
                                        <?php if (form_error('nama') || (isset($ada))) {
                                                        echo 'is-invalid';
                                                    }elseif($nama){
                                                        echo 'is-invalid';
                                                    }else{
                                                        echo '';
                                } ?>"  id="nama" name="nama" value="<?=$supplier['nama_supplier']; ?>">
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <small class="form-text text-danger"><?= form_error('nama') ?></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="notelp">Nomor Telpon</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?php if (form_error('notelp') || (isset($ada))) {
                                                        echo 'is-invalid';
                                                    }elseif($telp){
                                                        echo 'is-invalid';
                                                    }else{
                                                        echo '';
                                } ?>" id="notelp" name="notelp" value="<?= $supplier['no_telp']; ?>" >
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <small class="form-text text-danger"><?= form_error('notelp') ?></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="alamat">Alamat</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="alamat" id="alamat" cols="" rows=""><?= $supplier['alamat']; ?></textarea>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success float-right"><span style="font-size: 15px; color: white;"> <i class="fas fa-edit"> Ubah </i> </span></button>
                                
                                <span style="font-size: 25px; color: Dodgerblue;">
                                <a href="<?= base_url(); ?>supplier/ubah/<?= $supplier['id_supplier'] ?>" style="text-decoration:none"><i class="fas fa-redo-alt"></i> </a>
                                </span>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    