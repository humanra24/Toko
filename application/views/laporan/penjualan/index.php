<form action="<?= base_url() ?>laporan/cetak" target="_blank" method="post">
	<div class="form-inline">
		<h2>LAPORAN PENJUALAN</h2>
		<div class="col-sm-8"></div>
		<input type="hidden" name="tglDari" value="<?php
                                                if (isset($dari)) {
                                                    echo $dari;
                                                } ?>">
		<input type="hidden" name="tglSampai" value="<?php
                                                    if (isset($sampai)) {
                                                        echo $sampai;
                                                    } ?>">
		<button type="submit" class="btn" style="font-size: 2em; color: blue;" title="cetak"><i
				class="fas fa-print"></i></button>
	</div>
</form>

<br>
<form action="<?= base_url() ?>laporan/cekTgl" method="post">
	<div class="form-inline">
		<label for="tglDdari" class="control-label">Dari</label>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" class="form-control" name="tglDari" id="" required="required" value="<?php
                                                                                                if (isset($dari)) {
                                                                                                    echo $dari;
                                                                                                } ?>">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="tglDdari" class="control-label">Sampai</label>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" class="form-control" name="tglSampai" id="" required="required" value="<?php
                                                                                                    if (isset($sampai)) {
                                                                                                        echo $sampai;
                                                                                                    } ?>">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="submit" class="btn btn-primary btn-small">
			<i class="fas fa-search"> cari</i></button>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<span style="font-size: 25px; color: Dodgerblue;">
			<a href="<?= base_url(); ?>laporan/penjualan" title="reset" style="text-decoration:none"><i
					class="fas fa-redo-alt"></i> </a>
		</span>
	</div>
</form>

<br>

<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="tabel">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Pengguna</th>
				<th>Total</th>
				<th>Aksi</th>
			</tr>

		</thead>
		<tbody>
			<?php
            $no = 1;
            foreach ($laporan as $lapor) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?php $tgl = $lapor['tgl_penjualan'];;
                            $tgl = date('d-m-Y', strtotime($tgl));
                            echo $tgl;?></td>
				<td><?= $lapor['nama_pengguna']; ?></td>
				<td><?= $lapor['harga_total']; ?></td>
				<td>
					<form action="<?= base_url(); ?>laporan/det_Lap_pen" method="post">
						<input type="hidden" name="id" value="<?= $lapor['id_penjualan']; ?>">
						<button type="submit" class="btn btn-info" title="Detail" id="btnDetail"><i
								class="fas fa-info"></i></button>
					</form>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
