<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>cetak</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<!-- end bootstrap -->

</head>

<body>
	<center>
		<strong>
			<h1>LAPORAN STOK KELUAR </h1>
		</strong>
	</center>
	<h5 class="card-title">
		<?php
            foreach ($laporan1 as $lapor) : ?>
		<table>
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
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover" id="tabel">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama Barang</th>
					<th>Keterangan</th>
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
					<td><?= $lapor['ket']; ?></td>
					<td><?= $lapor['jml_barang']; ?></td>
				</tr>
				<?php
             endforeach ?>
			</tbody>
		</table>
	</div>
	<script>
		window.print();

	</script>
</body>

</html>
