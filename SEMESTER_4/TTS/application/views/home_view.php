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
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />
	<title>Home View</title>

</head>

<body>
	<div class="row m-0 p-0">
		<div class="vh-100 p-0 m-0 sidebar overflow-auto" id="col1" style="">
			<div class="list-group-item">
				<div class="row align-items-center overflow-hidden">
					<div class="col-3">
						<img src="<?= base_url() ?>assets/images/profile.jpg" class="rounded-circle mb-3 w-100"
							alt="Avatar" />
					</div>
					<div class="col-9 justify-content-center">
						<h5 class="mb-2 text-nowrap"><strong>Rizal Faizin Firdaus</strong></h5>
						<p class="text-muted text-nowrap">Rizal's Company Lab</p>
					</div>
				</div>
			</div>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action active">Home</a>
			<a href="<?= base_url() ?>purcase/index" class="list-group-item list-group-item-action ">Purcase</a>
			<a href="<?= base_url() ?>purcase/add_new_purcase" class="list-group-item list-group-item-action ">Add
				Purcase</a>


			<div id="accordion">
				<div class="card">
					<div class="list-group-item list-group-item-action btn btn-link text-left text-reset text-decoration-none"
						id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
						aria-controls="collapseOne">
						Export Purcase
					</div>

					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						<a href="<?= base_url('Purcase/pdf') ?>" target="_blank"
							class="list-group-item list-group-item-action">PDF</a>
						<a href="<?= base_url('Purcase/excel') ?>"
							class="list-group-item list-group-item-action">EXCEL</a>
					</div>
				</div>

			</div>
			<a href="<?= base_url() ?>VendorController/index" class="list-group-item list-group-item-action ">Vendor</a>
			<a href="<?= base_url() ?>VendorController/add_new_vendor"
				class="list-group-item list-group-item-action">Add
				Vendor</a>

			<div id="accordion">
				<div class="card">
					<div class="list-group-item list-group-item-action btn btn-link text-left text-reset text-decoration-none"
						id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
						aria-controls="collapseTwo">
						Export Vendor
					</div>

					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<a href="<?= base_url('VendorController/pdf') ?>" target="_blank"
							class="list-group-item list-group-item-action">PDF</a>
						<a href="<?= base_url('VendorController/excel') ?>"
							class="list-group-item list-group-item-action">EXCEL</a>
					</div>
				</div>

			</div>
			<a href="<?= base_url() ?>Items/index" class="list-group-item list-group-item-action ">Items</a>
			<a href="<?= base_url() ?>Items/add_new_items" class="list-group-item list-group-item-action">Add
				Items</a>

			<div id="accordion">
				<div class="card">
					<div class="list-group-item list-group-item-action btn btn-link text-left text-reset text-decoration-none"
						id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
						aria-controls="collapseThree">
						Export Items
					</div>

					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						<a href="<?= base_url('Items/pdf') ?>" target="_blank"
							class="list-group-item list-group-item-action">PDF</a>
						<a href="<?= base_url('Items/excel') ?>"
							class="list-group-item list-group-item-action">EXCEL</a>
					</div>
				</div>

			</div>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
		</div>

		<div class="col overflow-auto p-0 m-0">
			<nav class="navbar navbar-light bg-light">
				<button class="navbar-toggler" id="toggleNav" type="button">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="<?= base_url() ?>">Rizal's Company Lab</a>
			</nav>
			<div class="container">

				<div class="row mt-3 justify-content-center">
					<div class="col col-md-8">
						<div class="card">
							<div class="card-header">
								Halaman Utama
							</div>
							<div class="card-body">
								<h5 class="card-title">Sistem Pembelian Terintegrasi</h5>
								<p class="card-text">Klik tombol dibawah untuk memulai menambahkan pembelian, vendor,
									dan juga item</p>
								<a href="<?= site_url('Purcase'); ?>" class="btn btn-primary">View
									Purcase</a>
								<a href="<?= site_url('Vendor'); ?>" class="btn btn-primary">View
									Vendor</a>
								<a href="<?= site_url('Items'); ?>" class="btn btn-primary">View
									Items</a>
							</div>
						</div>
					</div>
				</div>
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