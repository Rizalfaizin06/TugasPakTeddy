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
    <title>Add Product View</title>

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
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action active">Product</a>
            <a href="<?= base_url('Export') ?>" target="_blank" class="list-group-item list-group-item-action">Export
                Product</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action active">Product</a>
            <a href="<?= base_url('Export') ?>" target="_blank" class="list-group-item list-group-item-action">Export
                Product</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action active">Product</a>
            <a href="<?= base_url('Export') ?>" target="_blank" class="list-group-item list-group-item-action">Export
                Product</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action active">Product</a>
            <a href="<?= base_url('Export') ?>" target="_blank" class="list-group-item list-group-item-action">Export
                Product</a>
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
                                Form Tambah Product
                            </div>
                            <div class="card-body">
                                <form action="<?= site_url('product/save'); ?>" method="post">
                                    <div>
                                        <label class="form-label" for="product">Product Name</label>
                                        <input class="form-control" type="text" name="product_name"
                                            placeholder="Product Name" id="product" required>
                                    </div>
                                    <div>
                                        <label class="form-label" for="harga">harga</label>
                                        <input class="form-control" id="harga" type="text" name="product_price"
                                            placeholder="Product Price" required>
                                    </div>
                                    <button type="submit" class="btn btn-success float-end mt-2">Submit</button>
                                    <a href="<?= site_url('product'); ?>" class="btn btn-primary float-end mt-2  me-2">
                                        Batal</a>
                                </form>
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