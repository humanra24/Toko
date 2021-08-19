<div class="row mt-5">
    <div class="col-md-3"></div>
    <div class="col-md-6">

        <div class="container">


            <div class="card">
                <div class="card-header">
                    <span style="font-size: 25px; color: Dodgerblue;">
                        <a href="<?= base_url(); ?>barang" style="text-decoration:none"><i class="fas fa-arrow-left">
                            </i> </a>
                    </span>
                    &nbsp;
                    <span style="font-size: 25px;">
                        Tambah Barang
                    </span>
                </div>
                <div class="card-body">

                    <?php if (isset($ada)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $ada; ?>
                        </div>
                    <?php endif ?>

                    <form id="kirim" action="<?= base_url(); ?>barang/tambah" method="post">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="id">kode barang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?php if (form_error('kode')) {
                                                                            echo 'is-invalid';
                                                                        } elseif ($cekkode) {
                                                                            echo 'is-invalid';
                                                                        } elseif ($kode == !null) {
                                                                            echo 'is-valid';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>" id="kode" name="kode" value="<?= $kode; ?>">
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('kode') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="nama">Nama Barang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?php if (form_error('nama')) {
                                                                            echo 'is-invalid';
                                                                        } elseif ($ceknama) {
                                                                            echo 'is-invalid';
                                                                        } elseif ($nama == !null) {
                                                                            echo 'is-valid';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>" id="nama" name="nama" value="<?= $nama; ?>">
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('nama') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="hargaBeli">Harga Beli</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?php if (form_error('hb')) {
                                                                            echo 'is-invalid';
                                                                        } elseif ($hb == !null) {
                                                                            echo 'is-valid';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>" name="hb" id="hb" value="<?= $hb; ?>">
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('hb') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="jenis">Jenis</label>
                            <div class="col-sm-8">
                                <select name="jenis" class="form-control" id="jenis">
                                    <option value="Alat Tulis"> Alat Tulis</option>
                                    <option value="Sembako"> Sembako</option>
                                    <option value="Per. Mandi dan Cuci"> Per. Mandi dan Cuci</option>
                                    <option value="Makanan Ringan"> Makanan Ringan</option>
                                    <option value="Minuman"> Minuman</option>
                                    <option value="Per. Rumah Tangga"> Per. Rumah Tangga</option>
                                    <option value="Obat-obatan"> Obat-obatan</option>
                                    <option value="Keperluan Bayi"> Keperluan Bayi</option>
                                    <option value="lain-lain"> lain-lain</option>
                                </select>
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('jenis') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="hargaJual">Harga Jual</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?php if (form_error('hj')) {
                                                                            echo 'is-invalid';
                                                                        } elseif ($hj == !null) {
                                                                            echo 'is-valid';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>" name="hj" id="hj" value="<?= $hj; ?>">
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('hj') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="stok">Stok</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?php if (form_error('stok')) {
                                                                            echo 'is-invalid';
                                                                        } elseif ($stok == !null) {
                                                                            echo 'is-valid';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>" name="stok" id="stok" value="<?= $stok; ?>">
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <small class="form-text text-danger"><?= form_error('stok') ?></small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><span style="font-size: 15px; color: white;"> <i class="fas fa-plus"> Tambah </i> </span></button>

                        <span style="font-size: 25px; color: Dodgerblue;">
                            <a href="<?= base_url(); ?>barang/tambah" style="text-decoration:none"><i class="fas fa-redo-alt"></i> </a>
                        </span>

                    </form>


                </div>
            </div>

        </div>
    </div>
</div>