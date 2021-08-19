<div class="row mt-5">
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
                        Ubah Kasir
                        </span>

                    </div>
                    <div class="card-body">

                    <?php if (isset($ada)): ?>
                        <div class="alert alert-danger" role="alert">
                        <?= $ada; ?>
                        </div>
                    <?php endif ?> 

                    <form action="" method="post">

                        <input type="hidden" value="<?= $pengguna['id_pengguna']; ?>" name="id" id="id">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="nama">Nama Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $pengguna['nama_pengguna']; ?>" />
                            </div>
                            <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('nama') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="jk">Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <?php foreach ($jk as $jk) : ?>                                    
                                    <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="<?= $jk ?>" class="custom-control-input" name="jk" <?php if ($jk == $pengguna['jk']) {
                                                echo 'checked'; 
                                                } ?> 
                                                value="<?= $jk; ?>" />
                                                <label class="custom-control-label" for="<?= $jk ?>"><?php if ($jk == 'L') {
                                                    echo 'Laki laki';
                                                }else {
                                                    echo 'Perempuan';
                                                }?></label>
                                                    &nbsp;&nbsp;
                                            
                                    </div>                                
                                <?php endforeach; ?>
                            </div>                                          
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="notelp">No Telpon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="notelp" id="notelp" value="<?= $pengguna['no_telp']; ?>" />
                            </div>
                            <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="alamat">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="alamat" id="alamat" cols="" rows="" ><?= $pengguna['alamat']; ?></textarea>
                            </div>
                            <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="username">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" id="username" value="<?= $pengguna['username']; ?>" />
                            </div>
                            <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('username') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="password">Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="password" id="password" value="<?= $pengguna['password']; ?>" />
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
                                
                                <button type="submit" class="btn btn-success float-right"><span style="font-size: 15px; color: white;"> <i class="fas fa-edit"> Ubah </i> </span></button>

                                <span style="font-size: 25px; color: Dodgerblue;">
                                <a href="<?= base_url(); ?>pengguna/ubah/<?= $pengguna['id_pengguna']; ?>" style="text-decoration:none"><i class="fas fa-redo-alt"></i> </a>
                                </span>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    






                
            