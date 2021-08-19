    <div class="row mt-5">
    <div class="col-md-3"></div>
        <div class="col-md-6">
        
            <div class="container">
                

                <div class="card">
                    <div class="card-header">
                            <span style="font-size: 25px; color: Dodgerblue;">
                            <a href="<?= base_url(); ?>supplier" style="text-decoration:none"><i class="fas fa-arrow-left">
                            </i> </a>
                            </span>
                        &nbsp;
                        <span style="font-size: 25px;">
                        Tambah Supplier
                        </span>

                    </div>
                    <div class="card-body">

                    <?php if (isset($ada)): ?>
                        <div class="alert alert-danger" role="alert">
                        <?= $ada; ?>
                        </div>
                    <?php endif ?> 

                            <form action="" method="post">
                            
                                <input type="hidden" name="id" id="id">

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="nama">Nama Supplier</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?php if (form_error('nama')||$ceknama) {
                                                        echo 'is-invalid';
                                                    }elseif($nama == !null){
                                                        echo 'is-valid';
                                                    }else{
                                                        echo '';
                                } ?>"  id="nama" name="nama" value="<?= $nama; ?>">
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <small class="form-text text-danger"><?= form_error('nama') ?></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="notelp">Nomor Telpon</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?php if (form_error('notelp')||$cektelp) {
                                                                echo 'is-invalid';
                                                            }elseif($notelp == !null){
                                                                echo 'is-valid';
                                                            }else{
                                    echo '';
                                } ?>" id="notelp" name="notelp" value="<?= $notelp; ?>" >
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <small class="form-text text-danger"><?= form_error('notelp') ?></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="alamat">Alamat</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control <?php if (form_error('alamat')) {
                                    echo 'is-invalid';
                                }elseif($alamat == !null){
                                    echo 'is-valid';
                                }else{
                                    echo '';
                                } ?>" name="alamat" id="alamat" cols="" rows=""><?= $alamat; ?></textarea>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary float-right"><span style="font-size: 15px; color: white;"> <i class="fas fa-plus"> Tambah </i> </span></button>

                                <span style="font-size: 25px; color: Dodgerblue;">
                                <a href="<?= base_url(); ?>supplier/tambah" style="text-decoration:none"><i class="fas fa-redo-alt"></i> </a>
                                </span>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    