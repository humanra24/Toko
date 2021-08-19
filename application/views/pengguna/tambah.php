<div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6">
        
            <div class="container">
                

                <div class="card">
                    <div class="card-header">
                            <span style="font-size: 25px; color: Dodgerblue;">
                            <a href="<?= base_url(); ?>pengguna" style="text-decoration:none"><i class="fas fa-arrow-left">
                            </i> </a>
                            </span>
                        &nbsp;
                        <span style="font-size: 25px;">
                        Tambah Kasir
                        </span>

                    </div>
                    <div class="card-body">

                    <?php if (isset($ada)): ?>
                        <div class="alert alert-danger" role="alert">
                        <?= $ada; ?>
                        </div>
                    <?php endif ?> 

                    <form action="" method="post">
                    
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="nama">Nama Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?php if (form_error('nama') || $ceknama) {
                                    echo 'is-invalid';
                                }elseif($nama == !null){
                                    echo 'is-valid';
                                }else{
                                    echo '';
                                } ?>" id="nama" name="nama" value="<?= $nama; ?>" />
                            </div>
                            <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('nama') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="jk">Jenis Kelamin</label>
                            <div class="col-sm-6">

                                <?php foreach($jk as $jjkk) : ?>
                                    <?php if ($jjkk == $jk1) : ?>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="<?= $jjkk ?>" class="custom-control-input" name="jk" checked="checked" value="<?= $jjkk; ?>" />
                                            <label class="custom-control-label" for="<?= $jjkk ?>"> <?php if ($jjkk == 'L') {
                                                echo 'Laki-laki';
                                            }else {
                                                echo 'Perempuan';
                                            } ?> </label>
                                            &nbsp;&nbsp;
                                        </div>
                                    <?php else : ?>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="jk" id="<?= $jjkk ?>" class="custom-control-input" value="<?= $jjkk; ?>" />
                                            <label class="custom-control-label" for="<?= $jjkk ?>"> <?php if ($jjkk == 'L') {
                                                echo 'Laki-laki';
                                            }else {
                                                echo 'Perempuan';
                                            } ?> </label>
                                            &nbsp;&nbsp;
                                        </div>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                
                            </div>               
                            
                
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="notelp">No Telpon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?php if (form_error('notelp')||$cektelp) {
                                    echo 'is-invalid';
                                }elseif($notelp == !null){
                                    echo 'is-valid';
                                }else{
                                    echo '';
                                } ?>" name="notelp" id="notelp" value="<?= $notelp; ?>" />
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
                                } ?>" name="alamat" id="alamat" cols="" rows="" ><?= $alamat; ?></textarea>
                            </div>
                            <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="username">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?php if (form_error('username')||$cekuser) {
                                    echo 'is-invalid';
                                }elseif($username == !null){
                                    echo 'is-valid';
                                }else{
                                    echo '';
                                } ?>" name="username" id="username" value="<?= $username; ?>" />
                            </div>
                            <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('username') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="password">Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?php if (form_error('password')) {
                                    echo 'is-invalid';
                                }elseif($password == !null){
                                    echo 'is-valid';
                                }else{
                                    echo '';
                                } ?>" name="password" id="password" value="<?= $password ?>" />
                            </div>
                            <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('password') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="golongan">Level</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="golongan" name="golongan" value="Kasir" />
                            </div>
                            <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('golongan') ?></small>
                            </div>
                        </div>                           
                                
                                <button type="submit" class="btn btn-primary float-right"><span style="font-size: 15px; color: white;"> <i class="fas fa-plus"> Tambah </i> </span></button>

                                <span style="font-size: 25px; color: Dodgerblue;">
                                <a href="<?= base_url(); ?>pengguna/tambah" style="text-decoration:none"><i class="fas fa-redo-alt"></i> </a>
                                </span>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    






                
            