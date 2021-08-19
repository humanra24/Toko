<div class="container text-center">
	<h1> <strong>Dashboard</strong></h1>
</div>


<div class="mt-5">
	<div class="container text-center">
		<h3>Transaksi Terakhir</h3>
	</div>
	<div class="text-left">

	</div>
	<div class="row">
		<div class="col-sm-6">
			<table class="table">
				<thead>
					<tr>
						<th style="font-size:40px"> <a href="<?= base_url(); ?>stok/masuk" style="color:black;">Stok
								Masuk</a></th>
						<th style="font-size:20px">QTY</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($stokMasukTerakhir as $masuk) : ?>
					<tr>
						<td style="font-size:30px"> <?= $masuk['nama_barang']; ?></td>
						<td style="font-size:30px"><?= $masuk['jml_barang']; ?></td>
					</tr>
					<tr>
						<td style="font-size:20px">
							<?php $tgl = $masuk['tgl'];
                            $tgl1 = date('d-m-Y', strtotime($tgl));
                            echo $tgl1;
                            
                            
                            ?>
						<td></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<div class="col-sm-6">
			<table class="table">
				<thead>
					<th style="font-size:40px"><a href="<?= base_url(); ?>stok/keluar" style="color:black;">Stok
							Keluar</a></th>
					<th style="font-size:20px">QTY</th>
				</thead>
				<tbody>
					<?php foreach ($stokKeluarTerakhir as $keluar) : ?>
					<tr>
						<td style="font-size:30px"> <?= $keluar['nama_barang']; ?></td>
						<td style="font-size:30px"><?= $keluar['jml_barang']; ?></td>
					</tr>
					<tr>
						<td style="font-size:20px">
							<?php $tgl = $keluar['tgl'];
                            $tgl1 = date('d-m-Y', strtotime($tgl));
                            echo $tgl1;?>
						</td>
						<td></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
