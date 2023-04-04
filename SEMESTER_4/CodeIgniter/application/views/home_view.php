<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>Home View</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />
</head>

<body>

	<div class="collapse navbar-collapse bg-light p-0 mt-0 d-flex flex-column mobileMenu" id="navbarSupportedContent">
		<div class="navbar-nav align-self-stretch list-group">
			<div class="list-group-item">


				<div class="row align-items-center ">
					<div class="col-4">
						<img src="<?= base_url() ?>assets/images/profile.jpg" class="rounded-circle mb-3"
							style="width: 80px;" alt="Avatar" />
					</div>
					<div class="col-8 justify-content-center">
						<h5 class="mb-2"><strong>Rizal Faizin Firdaus</strong></h5>
						<p class="text-muted">Rizal's Company Lab</p>
					</div>
				</div>

			</div>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action active">Home</a>
			<a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action">Product</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action active">Home</a>
			<a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action">Product</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action active">Home</a>
			<a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action">Product</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action active">Home</a>
			<a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action">Product</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action active">Home</a>
			<a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action">Product</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
		</div>

	</div>

	<div class="overlay"></div>
	<nav class="navbar navbar-collapse navbar-light bg-light justify-content-sm-start fixed-top" aria-expanded="false">
		<div class="container-fluid">
			<a class="navbar-brand order-1 ml-2 mr-auto" href="#">Rizal's Company Lab</a>
			<button class="navbar-toggler align-self-start" aria-expanded="false" type="button">
				<span class="navbar-toggler-icon"></span>
			</button>


		</div>

	</nav>
	<div class="container my-5 py-3">
		<div class="card">
			<div class="card-header">
				Halaman Utama
			</div>
			<div class="card-body">
				<h5 class="card-title">Cara Akses Data Product</h5>
				<p class="card-text">Bisa dengan Klik tombol dibawah atau link product di NavBar.</p>
				<a href="<?= site_url('product'); ?>" class="btn btn-primary">View
					Product</a>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/js/jquery.min.js">
	</script>
	<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js">
	</script>
	<script src="<?= base_url() ?>assets/js/script.js">
	</script>
</body>

</html>