<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Home View</title>
	<link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-expand-md bg-light sticky-top">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url() ?>">Testing
				CodeIgniter</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-link" aria-current="page" href="<?= base_url() ?>">Home</a>
					<a class="nav-link" href="<?= base_url() ?>product/index">Product</a>
				</div>
			</div>
		</div>
	</nav>
	<div class="container mt-3">
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
	<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js">
	</script>
</body>

</html>