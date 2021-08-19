<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>cetak</title>

	<style type="text/css">
		body {
			width: 100%;
			height: 100%;
			margin: 0mm;
			padding: 0mm;
			background-color: white;
			font: 10pt "Times New Roman";
		}



		.page {
			width: 58mm;
			padding: 0mm;
			margin: 0mm auto;
			border: 1px #D3D3D3 solid;
			background: white;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);

		}

		hr {
			border: 1px dashed;
		}

	</style>


</head>

<body>
	<div class="page">
		<center>
			Toko Pandawa
			<br>
			jl. Sudimara No.03
		</center>

		<table>
			<thead>
				<tr>
					<td>
						<hr>
					</td>
					<td>
						<hr>
					</td>
					<td>
						<hr>
					</td>
					<td>
						<hr>
					</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td align="center">qty</td>
					<td align="center">Harga</td>
					<td align="center"></td>
				</tr>

			</thead>
			<tbody>
				<?php foreach ($penjualan as $penj) : ?>
				<tr>
					<td><?= $penj['nama_barang']; ?></td>
					<td align="center"><?= $penj['jml_barang']; ?></td>
					<td align="center"><?= $penj['harga_jual']; ?></td>
					<td align="center"><?= $penj['subTot']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td>
						<hr>
					</td>
					<td>
						<hr>
					</td>
					<td>
						<hr>
					</td>
					<td>
						<hr>
					</td>
				</tr>
			</tfoot>
		</table>
		<center>
			Terimakasih Telah Berkunjung
		</center>
	</div>
	<script>
		window.print();

	</script>
</body>

</html>
