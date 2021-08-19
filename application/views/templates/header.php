<!doctype html>
<html lang="en">

<head>

	<title><?= $judul; ?></title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<!-- end bootstrap -->

	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/images/logo.png">

	<!-- fontAwesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/fontAwesome/css/all.css">
	<!-- end fontAwesome -->

	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/DataTables/datatables.min.css" />
	<!-- end datatables -->

</head>

<body>

	<nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
		<a class="navbar-brand" <?php if ($this->session->userdata("level") == 'Admin') : ?>
			href="<?= base_url() ?>dashboard" <?php endif; ?>><strong>TOKO PANDAWA</strong></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">

				<?php if ($this->session->userdata("level") == 'Admin') : ?>
				<li class="nav-item <?php if ($judul == 'Daftar Supplier') {
                                            echo 'active';
                                        } ?> ">
					<a class="nav-link" href="<?= base_url() ?>supplier"><i class="fas fa-user"></i> Supplier</a>
				</li>
				<?php endif; ?>

				<?php if ($this->session->userdata("level") == 'Admin') : ?>
				<li class="nav-item <?php if ($judul == 'Daftar Kasir') {
                                            echo 'active';
                                        } ?>">
					<a class="nav-link" href="<?= base_url() ?>Pengguna"><i class="fas fa-user"></i> Kasir</a>
				</li>
				<?php endif; ?>

				<?php if ($this->session->userdata("level") == 'Admin') : ?>
				<li class="nav-item <?php if ($judul == 'Daftar Barang') {
                                            echo 'active';
                                        } ?>">
					<a class="nav-link" href="<?= base_url() ?>barang"><i class="fas fa-box"></i> Barang</a>
				</li>
				<?php endif; ?>

				<?php if ($this->session->userdata("level") == 'Admin') : ?>
				<li class="nav-item <?php if ($judul == 'Daftar Stok Masuk' || $judul == 'Daftar Stok Keluar') {
                                                        echo 'active';
                                                    } ?> ">
					<a class="nav-link" href="<?= base_url() ?>stok/masuk"><i class="fas fa-box-open"></i> Stok</a>
				</li>
				<?php endif; ?>

				<?php if ($this->session->userdata("level") == 'Admin') : ?>
				<li class="nav-item <?php if ($judul == 'Penjualan') {
                                        echo 'active';
                                    } ?>">
					<a class="nav-link" href="<?= base_url() ?>penjualan"><i class="fas fa-money-bill-alt"></i>
						Penjualan</a>
				</li>
				<?php endif; ?>

				<?php if ($this->session->userdata("level") == 'Admin') : ?>

				<li class="nav-item dropdown <?php if ($judul == 'Laporan Penjualan' || $judul == 'Laporan Stok Masuk'|| $judul =='Laporan Stok Keluar' || $judul =='Detail Stok Keluar' || $judul =='Detail Stok Masuk') {
                                                        echo 'active';
                                                    } ?> ">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="far fa-clipboard"></i> Laporan
					</a>
					<div class="dropdown-menu">
						<a href="<?= base_url() ?>laporan/penjualan" class="dropdown-item">Penjulan</a>
						<a href="<?= base_url() ?>laporan/stokMasuk" class="dropdown-item">Stok</a>
					</div>
				</li>

				<?php endif; ?>
			</ul>
			<div class="nav-item dropdown float-right">
				<a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false" style="color: silver;">
					<i class="far fa-user-circle"></i> <?php echo $this->session->userdata("nama"); ?>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<?php if ($this->session->userdata("level") == 'Admin') : ?>
					<a href="<?= base_url(); ?>pengguna/editProfil/1" class="dropdown-item"><i class="fas fa-user-edit"></i> Edit
						Profil</a>
					<?php endif; ?>
					<a href="<?= base_url() ?>login/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
						keluar</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="ml-5 mr-5 mt-4 mb-3">
