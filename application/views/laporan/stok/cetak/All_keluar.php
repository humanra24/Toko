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
			<h3>Toko Kelontong</h3>
			<h3>"PANDAWA"</h3>
			Jl. Sudimara rt 03/06, Desa Bantarmangu, Kec. Cimanggu, kab. Cilacap, Jawa Tengah, kode pos: 53256
			<hr color="black" border="10px">
			<h4>LAPORAN STOK KELUAR</h4>
		</strong>

		<?php if ($dari == null || $sampai == null) {
            echo 'Semua Stok Keluar';
        } else {
            $tglD = $dari;
            $dari1 = date('d-m-Y', strtotime($tglD));
            $tglS = $sampai;
            $sampai1 = date('d-m-Y', strtotime($tglS));
            echo "$dari1 &nbsp;-&nbsp; $sampai1";
        } ?>
	</center>

	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover" id="tabel">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Pengguna</th>
				</tr>

			</thead>
			<tbody>
				<?php
            $no = 1;
            foreach ($laporan as $lapor) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?php $tgl = $lapor['tgl'];
                            $tgl = date('d-m-Y', strtotime($tgl));
                            echo $tgl;?></td>
					<td><?= $lapor['nama_pengguna']; ?></td>
					<td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<br>
	<br>

	<div class="row">
		<div class="col-sm-9"></div>
		<table>
			<tr>
				<td align="center">
					<?= date('d-m-Y'); ?>
				</td>
			</tr>
            <tr>
				<td align="center">
					Admin
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;
				</td>
			</tr>
            <tr>
				<td>
					&nbsp;
				</td>
			</tr>
			<tr>
				<td align="center">
					<?php echo $this->session->userdata("ceknama"); ?>
				</td>
			</tr>
		</table>

	<script>
		window.print();

	</script>
</body>

</html>
