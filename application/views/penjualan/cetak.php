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
			<h3>Toko Pandawa</h3>
			Jl. Sudimara rt 03/06, Cimanggu
		</center>

		<center>
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
						<td>Nota : <?= $no; ?></td>
						<td></td>
						<td><?php date_default_timezone_set('Asia/Jakarta');
                        echo date('H:i:s'); ?></td>
						<td><?php date_default_timezone_set('Asia/Jakarta');
                        echo date('d/m/Y'); ?></td>
					</tr>

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
						<td align="center">Sub Total</td>
					</tr>
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

				</thead>
				<tbody>
					<?php foreach ($penjualan as $penj) : ?>
					<tr>
						<td><?= $penj['nama_barang']; ?></td>
						<td align="center"><?= $penj['jml_barang']; ?></td>
						<td align="center"><?= $penj['harga_jual']; ?></td>
						<td align="center"><?= number_format($penj['subTot'], 0, ".", ","); ?></td>
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
					<tr>
						<td>Total</td>
						<td>:</td>
						<td></td>
						<td align="center"><?= number_format($tot, 0, ".", ","); ?></td>
					</tr>
					<tr>
						<td>Bayar</td>
						<td>:</td>
						<td></td>
						<td align="center"><?php if ($bayar != null) {
							echo number_format($bayar, 0, ".", ",");
						}  ?></td>
					</tr>
					<tr>
						<td>Kembali</td>
						<td>:</td>
						<td></td>
						<td align="center"><?php if ($bayar != null) {
										$kembali = $bayar - $tot;
										if ($kembali < 0) {
											echo 'Bayar kurang !!!';
										}else{
										echo number_format($kembali, 0, ".", ",");}} ?></td>
					</tr>
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
		</center>
		<center>
			Terimakasih Telah Berkunjung
		</center>
	</div>
	<script>
		window.print();
	</script>
</body>

</html>
