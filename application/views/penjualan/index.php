<!-- alert -->
<div class="col-sm-12">
	<div class="float-right">
		<?php if ($this->session->flashdata('flash')) : ?>
		<div class="row">
			<div class="col">
				<div class="alert alert-<?= $this->session->flashdata('warna'); ?> alert-dismissible fade show"
					role="alert">
					<strong><?= $this->session->flashdata('flash'); ?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>

<!-- end alert -->

<form method="POST" action="<?= base_url(); ?>penjualan/tambah">
	<div class="form-inline">
		<div class="form-group">

			&nbsp;&nbsp;&nbsp;

			<label class="col-sm-2 control-label" for="no">No</label>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" class="form-control col-sm-3" name="no" id="no" value="<?= $no; ?>" readonly>

		</div>

	</div>

	<br>

	<div class="form-inline">
		<div class="form-group">

			<label class="control-label col" for="kode">Kode</label>
			<input type="text" class="form-control col-sm-3" name="kode" id="kode" oninput="this.form.submit();"
				autofocus onkeydown="nextfieldJml(event)" value="<?= $kodePil; ?>">

			<button type="button" class="btn btn-primary" id="btnBrg" data-toggle="modal" data-target="#tampilBrg"><i
					class="fas fa-search-plus"></i></button>

			<label class="col control-label" for="jml">Jumlah</label>
			<input type="text" name="jml" class="form-control col-sm-2" id="jmlPenj" value="1"
				onkeydown="nextfieldBarcode(event)">
			<div class="col-sm-2">
				<button type="submit" id="masuk" class="btn btn-primary" id="tambah"> <i class="fas fa-plus"></i>
					Tambah</button>
			</div>

			<div class="col-sm-2">
				<button type="button" class="btn btn-success" id="btnByr" onkeydown="nextfieldBarcode(event)"
					data-toggle="modal" data-target="#bayar"> <i class="far fa-money-bill-alt"> Bayar </i></button>
			</div>

				
		</div>
	</div>
</form>

<div class="col-sm-12">
	<h1 class="text-right" style="font-size:5em">RP. <span
			class="text-primary"><?= number_format($tot, 0, ".", "."); ?></span></h1>
</div>




<div class="table-responsive">
	<div class="mt-2">
		<table class="table table-bordered table-striped" id="bel">
			<thead>
				<tr class="table-secondary">
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">jumlah</th>
					<th scope="col">Harga</th>
					<th scope="col">Sub Total</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
                foreach ($penjualan as $penj) : ?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $penj['nama_barang']; ?></td>
					<td><?= $penj['jml_barang']; ?></td>
					<td><?= $penj['harga_jual']; ?></td>
					<td><?= $penj['subTot']; ?></td>
					<td>
						<a href="<?= base_url(); ?>penjualan/hapus/<?= $penj['id_detail_penjualan']; ?>"
							name="<?= $penj['nama_barang']; ?>" id="Belanja" class="btn hapus"> <span
								style="font-size: 20px; color: red;"> <i class="fas fa-trash-alt"></i> </span> </a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal lihat Brg -->
<div class="modal fade" id="tampilBrg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Barang</h5>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-striped" id="tabel">
					<thead>
						<tr class="table-secondary">
							<th scope="col">No</th>
							<th scope="col">Kode</th>
							<th scope="col">Nama Barang</th>
							<th scope="col">Harga</th>
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
							<td><?= $brg['harga_jual']; ?></td>
							<td>
								<form action="" method="post">
									<input type="hidden" name="kodePil" value="<?= $brg['id_barang']; ?>">
									<button type="submit" onsubmit="form" class="btn btn-success"><i
											class="fas fa-arrow-circle-down"> pilih </i> </span></button>
								</form>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal Bayar -->
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Bayar</h5>
			</div>
			<div class="modal-body">
				<form action="penjualan/tambahPenjualan" method="post">
					<input type="hidden" name="user" value="<?= $this->session->userdata("nama"); ?>">
					<div class="row">
						<span class="col-sm-1"></span>
						<span class="col-sm-2" style="font-size:3em">Bayar</span>
						<span class="col-sm-3"></span>
						<div class="input-group-prepend">
							<div class="input-group-text" style="font-size: 3em;">RP. </div>
						</div>
						<input type="text" class="col-sm-4 form-control" name="bayar" required onkeyup="hitung()"
							id="bayaran" style="font-size: 3em; text-align:right;">

					</div>
					<br>
					<div class="row">
						<span class="col-sm-1"></span>
						<span class="col-sm-2" style="font-size:3em">Total</span>
						<span class="col-sm-3"></span>
						<div class="input-group-prepend">
							<div class="input-group-text" style="font-size: 3em;">RP. </div>
						</div>
						<input type="text" readonly class="col-sm-4 form-control" name="total" id="total"
							onkeyup="hitung()" style="font-size: 3em; text-align:right;" value="<?= $tot; ?>">
					</div>
					<br>
					<div class="row">
						<span class="col-sm-1"></span>
						<span class="col-sm-2" style="font-size:3em">Kembali</span>
						<span class="col-sm-3"></span>
						<div class="input-group-prepend">
							<div class="input-group-text" style="font-size: 3em;">RP. </div>
						</div>
						<input type="text" readonly class="col-sm-4 form-control" id="kembali"
							style="font-size: 3em; text-align:right;" value="0000">
					</div>
					<br>
					<hr>
					<div class="float-right">
						<button type="submit" class="btn btn-primary">Selesai</button>
					</div>
				</form>
				<form action="penjualan/cetak" target="_blank" method="post">
					<input type="hidden" required class="col-sm-4 form-control" name="bayar2" id="bayar2"
						style="font-size: 3em; text-align:right;">
					<input type="hidden" readonly class="col-sm-4 form-control" name="total2" id="total" onkeyup="hitung()"
						style="font-size: 3em; text-align:right;" value="<?= $tot; ?>">
					<button type="submit" class="btn" title="cetak" style="font-size: 25px; color:green"><i
							class="fas fa-print"></i></button>
				</form>
			</div>

		</div>
	</div>
</div>
</div>
