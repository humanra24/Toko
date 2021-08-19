<div class="card">
	<div class="card-header">
		<span style="font-size: 25px; color: Dodgerblue;">
			<a href="<?= base_url(); ?>laporan/stokMasuk" style="text-decoration:none"><i class="fas fa-arrow-left">
				</i> </a>
		</span>
		&nbsp;
		<span style="font-size: 25px;">
			Detail Laporan Stok Masuk
		</span>
		<span class="float-right">
			<form action="<?= base_url(); ?>laporan/cetakMasuk" target="_blank" method="post">
				<input type="hidden" name="id_sup"
					value="<?php foreach ($laporan1 as $lapor) : ?> <?= $lapor['id_supplier'];?> <?php endforeach; ?>">
				<input type="hidden" name="tgl"
					value="<?php foreach ($laporan1 as $lapor) : ?> <?= $lapor['tgl'];?> <?php endforeach; ?>">
				<button type="submit" style="font-size: 25px; color: blue;" class="btn" title="cetak"><i
						class="fas fa-print"></i></button>
			</form>
		</span>
	</div>
	<div class="card-body">
		<h5 class="card-title">
			<?php
            foreach ($laporan1 as $lapor) : ?>
			<table>
				<tr>
					<td>
						Nama Supplier
					</td>
					<td>
						&nbsp;:&nbsp;
					</td>
					<td>
						<?= $lapor['nama_supplier']; ?>
					</td>
				</tr>
				<tr>
					<td>
						Tanggal
					</td>
					<td>
						&nbsp;:&nbsp;
					</td>
					<td>
						<?php $tgl = $lapor['tgl'];
                            $tgl1 = date('d-m-Y', strtotime($tgl));
                            echo $tgl1;
                            
                            
                            ?>
					</td>
				</tr>
			</table>

			<?php
            endforeach ?>
		</h5>
		<table class="table table-bordered table-striped table-hover" id="tabel">
			<thead>
				<tr>
					<th>No</th>
					<th>kode</th>
					<th>Nama Barang</th>
					<th>Qty</th>
				</tr>

			</thead>
			<tbody>
				<?php
            $no = 1;
            foreach ($laporan as $lapor) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $lapor['id_barang']; ?></td>
					<td><?= $lapor['nama_barang']; ?></td>
					<td><?= $lapor['jml_barang']; ?></td>
				</tr>
				<?php
            endforeach ?>
			</tbody>
		</table>
	</div>
</div>
