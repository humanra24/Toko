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
						<a href="<?= base_url(); ?>barang" style="text-decoration:none"><i class="fas fa-arrow-left">
							</i> </a>
					</span>
					&nbsp;
					<span style="font-size: 25px;">
						Ubah Barang
					</span>
				</div>
				<div class="card-body">

					<?php if (isset($ada)) : ?>
					<div class="alert alert-danger" role="alert">
						<?= $ada; ?>
					</div>
					<?php endif ?>

					<form id="kirim" action="" method="post">

						<input type="hidden" name="id" value="<?= $barang['id_barang']; ?>">

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="id">kode barang</label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control <?php if (form_error('kode') || isset($ada)) {
                                                                                    echo 'is-invalid';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>" id="kode" name="kode"
									value="<?= $barang['id_barang']; ?>">
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<small class="form-text text-danger"><?= form_error('kode') ?></small>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="nama">Nama Barang</label>
							<div class="col-sm-8">
								<input type="text" class="form-control <?php if (form_error('nama') || isset($ada)) {
                                                                            echo 'is-invalid';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>" id="nama" name="nama"
									value="<?= $barang['nama_barang']; ?>">
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<small class="form-text text-danger"><?= form_error('nama') ?></small>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="jenis">Jenis</label>
							<div class="col-sm-8">
								<select name="jenis" class="form-control" id="jenis">
									<option value="Alat Tulis" <?php if ($barang['jenis_brg'] == 'Alat Tulis') {
                                                                            echo 'selected';
                                                                        } ?>> Alat Tulis</option>
									<option value="Sembako" <?php if ($barang['jenis_brg'] == 'Sembako') {
                                                                            echo 'selected';
                                                                        } ?>> Sembako</option>
									<option value="Per. Mandi dan Cuci" <?php if ($barang['jenis_brg'] == 'Per. Mandi dan Cuci') {
                                                                            echo 'selected';
                                                                        } ?>> Per. Mandi dan Cuci</option>
									<option value="Makanan Ringan" <?php if ($barang['jenis_brg'] == 'Makanan Ringan') {
                                                                            echo 'selected';
                                                                        } ?>> Makanan Ringan</option>
									<option value="Minuman" <?php if ($barang['jenis_brg'] == 'Minuman') {
                                                                            echo 'selected';
                                                                        } ?>> Minuman</option>
									<option value="Per. Rumah Tangga" <?php if ($barang['jenis_brg'] == 'Per. Rumah Tangga') {
                                                                            echo 'selected';
                                                                        } ?>> Per. Rumah Tangga</option>
									<option value="Obat-obatan" <?php if ($barang['jenis_brg'] == 'Obat-obatan') {
                                                                            echo 'selected';
                                                                        } ?>> Obat-obatan</option>
									<option value="Keperluan Bayi" <?php if ($barang['jenis_brg'] == 'Keperluan Bayi') {
                                                                            echo 'selected';
                                                                        } ?>> Keperluan Bayi</option>
									<option value="lain-lain" <?php if ($barang['jenis_brg'] == 'lain-lain') {
                                                                            echo 'selected';
                                                                        } ?>> lain-lain</option>
								</select>
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<small class="form-text text-danger"><?= form_error('jenis') ?></small>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="hargaBeli">Harga Beli</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="hb" id="hb"
									value="<?= $barang['harga_beli']; ?>">
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<small class="form-text text-danger"><?= form_error('hb') ?></small>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="hargaJual">Harga Jual</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="hj" id="hj"
									value="<?= $barang['harga_jual']; ?>">
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<small class="form-text text-danger"><?= form_error('hj') ?></small>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="stok">Stok</label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control" name="stok" id="stok"
									value="<?= $barang['stok']; ?>">
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<small class="form-text text-danger"><?= form_error('stok') ?></small>
							</div>
						</div>
						<button type="submit" class="btn btn-success float-right"><span
								style="font-size: 15px; color: white;"> <i class="fas fa-edit"> Ubah </i>
							</span></button>

						<span style="font-size: 25px; color: Dodgerblue;">
							<a href="<?= base_url(); ?>barang/ubah/<?= $barang['id_barang'] ?>"
								style="text-decoration:none"><i class="fas fa-redo-alt"></i> </a>
						</span>
					</form>


				</div>
			</div>

		</div>
	</div>
</div>
