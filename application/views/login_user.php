<!doctype html>
<html lang="en">

<head>
	<title>Login </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?= base_url() ?>template_login/css/style.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">ShopEase</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
						<div class="img d-flex align-items-center justify-content-center" style="background-image: url(<?= base_url() ?>template_login/images/icon_user.jpg);"></div>
						<h3 class="text-center mb-0">Selamat Datang</h3>
						<p class="text-center">Masuk dengan memasukkan informasi di bawah ini</p>
						<form action="<?= base_url('login_user'); ?>" method="POST">
							<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
							<?php echo $this->session->flashdata('message'); ?>
							<div class="form-group">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
								<input type="email" name="email" id="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
								<input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
							</div>
							<!-- Tambahkan widget reCAPTCHA V2 Checkbox di sini -->

							<!-- <div class="form-group d-md-flex">
								<div class="w-100 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div> -->
							<div class="g-recaptcha" data-sitekey="6LfbTUAoAAAAABZL1r8dWTq_L1p_3trPFkNc2Ngr"></div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit px-3">Masuk</button>
								<a href="<?= base_url('home') ?>" class="btn btn-primary rounded submit px-3" id="batalButton">Kembali</a>
							</div>


							<style>
								.g-recaptcha {
									margin-bottom: 10px;
									/* Menambahkan margin bawah antara reCAPTCHA dan tombol */
								}

								.form-group {
									display: flex;
									flex-direction: column;
								}

								.btn {
									margin-top: 10px;
									/* Menambahkan margin atas antara tombol "Batal" dan "Masuk" */
								}
							</style>

						</form>
						<div class="w-100 text-center mt-4 text">
							<p class="mb-0">Belum Punya akun?</p>
							<a href="<?= base_url('login_user/register') ?>">SIGN UP</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?= base_url() ?>template_login/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>template_login/js/popper.js"></script>
	<script src="<?= base_url() ?>template_login/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>template_login/js/main.js"></script>

</body>

</html>