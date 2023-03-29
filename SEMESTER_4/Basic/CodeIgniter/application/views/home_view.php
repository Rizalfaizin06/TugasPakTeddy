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
			<a class="navbar-brand text-secondary text-bold">Default Controller</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
				a aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-link text-secondary" aria-current="page">Home</a>
					<a class="nav-link text-secondary">Profile</a>
				</div>
			</div>
		</div>
	</nav>
	<div class="container mt-3">
		<div class="card">
			<div class="card-header text-center">
				Home Page
			</div>
			<div class="card-body">
				<h5 class="card-title text-center">Ini Adalah Home Page Default</h5>
				<p class="card-text text-center">Responsi 2</p>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js">
	</script>
</body>

</html>