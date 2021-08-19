<!-- alert -->

<!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-siapa" data-flashsiapa="<?= $this->session->flashdata('siapa'); ?>"></div> -->

<?php if ($this->session->flashdata('flash') && $this->session->flashdata('siapa')) : ?>
<!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data barang
                    <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <strong>berhasil</strong> <?= $this->session->flashdata('siapa'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->
<?php endif; ?>

<!-- end alert -->

<!-- label barang -->

<h2>Daftar Barang</h2>

<!-- end label barang -->

<!-- button tambah -->

<a href="<?= base_url(); ?>barang/tambah" class="btn float-right btn-primary">
	<span style="font-size: 15px; color: white;"> <i class="fas fa-plus"> Tambah </i> </span>
</a>

<!-- end button tambah -->

<!-- table barang -->

<div class="table-responsive">
	<div class="mt-2">
		<table class="table table-bordered table-striped" id="tabel">
			<thead>
				<tr class="table-secondary">
					<th scope="col"><b>No</b></th>
					<th scope="col"><b>Kode</b></th>
					<th scope="col"><b>Nama Barang</b></th>
					<th scope="col"><b>Jenis Barang</b></th>
					<th scope="col"><b>Harga Beli</b></th>
					<th scope="col"><b>Harga Jual</b></th>
					<th scope="col"><b>Stok</b></th>
					<th scope="col"><b>Aksi</b></th>
				</tr>

			</thead>
			<tbody>
				<?php $no = 1;
                foreach ($barang as $brg) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $brg['id_barang']; ?></td>
					<td><?= $brg['nama_barang']; ?></td>
					<td><?= $brg['jenis_brg']; ?></td>
					<td><?= $brg['harga_beli']; ?></td>
					<td><?= $brg['harga_jual']; ?></td>
					<td><?= $brg['stok']; ?></td>
					<td>
						<a href="<?= base_url(); ?>barang/ubah/<?= $brg['id_barang']; ?>" class="btn"><span
								style="font-size: 20px; color: green;"> <i class="fas fa-edit"></i> </span></a>
						<a href="<?= base_url(); ?>barang/hapus/<?= $brg['id_barang']; ?>" id="barang"
							name="<?= $brg['nama_barang']; ?>" class="btn hapus"><span
								style="font-size: 20px; color: red;"> <i class="fas fa-trash-alt"></i> </span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- end table barang -->
