<div class="row mt-5">
	<div class="col-md-3"></div>
	<div class="col-md-6">

		<div class="container">


			<div class="card">
				<div class="card-header">
					<span style="font-size: 25px; color: Dodgerblue;">
						<a href="<?= base_url(); ?>stok/masuk" style="text-decoration:none"><i
								class="fas fa-arrow-left">
							</i> </a>
					</span>
					&nbsp;
					<span style="font-size: 25px;">
						Tambah Stok Masuk
					</span>

				</div>
				<div class="card-body">

					<?php if (isset($ada)) : ?>
					<div class="alert alert-danger" role="alert">
						<?= $ada; ?>
					</div>
					<?php endif ?>

					
					<form method="POST" action="<?= base_url(); ?>stok/masukBarang/1">

						<div class="form-group row">
							<label class="control-label col" for="kode">Kode</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kode" id="kode"
									oninput="this.form.submit();" autofocus value="">

							</div>
						</div>

					</form>

					

					<form action="" method="post">
						<input type="hidden" name="user" value="<?= $this->session->userdata("nama"); ?>">

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="id">kode Barang</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-prepend">
										<input type="text" <?php if (isset($k) == !null) {
                                                                echo 'readonly';
                                                            } else {
                                                                echo 'readonly';
                                                            } ?> class="form-control" id="kode" name="kode"
											value="<?php if (isset($kode)) {
                                                                                                                        echo $kode;
                                                                                                                    } else {
                                                                                                                        echo $brg['id_barang'];
                                                                                                                    } ?>">
									</div>
									<button type="button" class="btn btn-primary" data-toggle="modal"
										data-target="#tampilBrg"><i class="fas fa-search-plus"></i></button>
								</div>
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<small class="form-text text-danger"><?= form_error('kode') ?></small>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="nama">Nama Barang</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nama" name="nama" value="<?php if (isset($nama)) {
                                                                                                            echo $nama;
                                                                                                        } else {
                                                                                                            echo $brg['nama_barang'];
                                                                                                        } ?>" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="hB">Harga Beli</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hb" name="b" value="<?php if (isset($nama)) {
                                                                                                            echo $nama;
                                                                                                        } else {
                                                                                                            echo $brg['harga_beli'];
                                                                                                        } ?>" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="hj">Harga Jual</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hj" name="hj" value="<?php if (isset($nama)) {
                                                                                                            echo $nama;
                                                                                                        } else {
                                                                                                            echo $brg['harga_jual'];
                                                                                                        } ?>" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="stok">Stok Barang</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="stok" name="stokb" value="<?php if (isset($stokb)) {
                                                                                                            echo $stokb;
                                                                                                        } else {
                                                                                                            echo $brg['stok'];
                                                                                                        } ?>" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="supplier">Supplier</label>
							<div class="col-sm-8">
								<select class="form-control custom-select" name="spl">
									<option value="" <?php if ($spl1 == null) {
                                                            echo 'selected';
                                                        } else {
                                                            echo '';
                                                        } ?>>-- Pilih Supplier --</option>
									<?php foreach ($supplier as $spl) : ?>
									<option <?php if ($spl['id_supplier'] == $spl1) {
                                                    echo 'selected';
                                                } else {
                                                    echo '';
                                                } ?> value="<?= $spl['id_supplier']; ?>"><?= $spl['nama_supplier']; ?>
									</option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<small class="form-text text-danger"><?= form_error('spl') ?></small>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="jml">Jumlah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="jml" id="jml" value="<?= $jml ?>">
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<small class="form-text text-danger"><?= form_error('jml') ?></small>
							</div>
						</div>
						<?php if (isset($nama) == NULL) : ?>

						<div class="form-group row">
							<a href="<?= base_url(); ?>stok/ubah/<?php if (isset($nama)) {
                                                                                                            echo $nama;
                                                                                                        } else {
                                                                                                            echo $brg['id_barang'];
                                                                                                        } ?>">Edit
								Barang</a>
						</div>

						<?php endif; ?>

						<button type="submit" class="btn btn-primary float-right">Tambah</button>

						<span style="font-size: 25px; color: Dodgerblue;">
							<a href="<?= base_url(); ?>stok/tambahMasuk" style="text-decoration:none"><i
									class="fas fa-redo-alt"></i> </a>
						</span>
					</form>

				</div>
			</div>

		</div>
	</div>
</div>



<!-- Modal lihat Brg -->
<div class="modal fade" id="tampilBrg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-striped" id="tabel">
					<thead>
						<tr class="table-secondary">
							<th scope="col">No</th>
							<th scope="col">Kode</th>
							<th scope="col">Nama Barang</th>
							<th scope="col">Harga Beli</th>
							<th scope="col">Harga Jual</th>
							<th scope="col">Stok</th>
							<th scope="col">Aksi</th>
						</tr>

					</thead>
					<tbody>
						<?php $no = 1;
                        foreach ($barang as $brg) : ?>
						<tr>
							<th><?= $no++ ?></th>
							<td><?= $brg['id_barang']; ?></td>
							<td><?= $brg['nama_barang']; ?></td>
							<td><?= $brg['harga_beli']; ?></td>
							<td><?= $brg['harga_jual']; ?></td>
							<td><?= $brg['stok']; ?></td>
							<td>
								<a href="<?= base_url(); ?>stok/masukBarang/<?= $brg['id_barang']; ?>" class="btn"><span
										style="font-size: 20px; color: green;"> <i class="fas fa-arrow-circle-down">
											pilih</i> </span></a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
