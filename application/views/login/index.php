<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $judul; ?></title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<!-- end bootstrap -->

	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/images/logo.png">

	<!-- fontAwesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/fontAwesome/css/all.css">
	<!-- end fontAwesome -->

	<style type="text/css">
		body {
			background: url('<?= base_url(); ?>assets/images/blue.jpg') no-repeat fixed;
			-webkit-background-size: 100% 100%;
			-moz-background-size: 100% 100%;
			-o-background-size: 100% 100%;
			background-size: 100% 100%;
		}

	</style>

</head>

<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-2 col-md-1"></div>
			<div class="col-lg-8 col-md-10">
				<div class="card">
					<div class="card-header">
						<span style="font-size: 30px;">
							<center>
								<strong>TOKO PANDAWA</strong>
							</center>
						</span>
					</div>
					<div class="card-body">

						<div class="form-inline">
							<div class="col-md-6">
								<center>
									<img src="<?= base_url() ?>assets/images/logoToko.png" width="300px" alt="...">
								</center>
							</div>
							<div class="col-md-6"> 
								<div class="card">
									<div class="card-header">
										<span style="font-size:20px;">
											<strong>Login</strong>
										</span>

									</div>
									<div class="card-body">

										<?php if ($this->session->flashdata('flash')) : ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<center>
												<strong><?= $this->session->flashdata('flash'); ?></strong>
											</center>
										</div>
										<?php endif; ?>

										<form action="<?= base_url(); ?>login/aksi_login" method="post">
											<div class="form-inline">
												<label for="username" class="form-label" style="font-size: 20px">
													<i class="fas fa-user"></i></label>
												&nbsp;&nbsp;&nbsp;
												<input type="text" required class="form-control col-sm-8"
													name="username" placeholder="Username">
											</div>

											<br>

											<div class="form-inline">
												<label for="inputPassword3" class="form-label"
													style="font-size: 20px"><i class="fas fa-lock"></i></label>
												&nbsp;&nbsp;&nbsp;
												<input type="password" required class="form-control col-sm-8"
													name="password" placeholder="password">
											</div>

											<br>

											<div class="form-inline">
												<button type="submit">Login</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
