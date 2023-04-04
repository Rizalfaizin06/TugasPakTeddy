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
    <title>EDIT Produk</title>
</head>

<body>


    <div class="collapse navbar-collapse bg-light p-0 mt-0 d-flex flex-column mobileMenu" id="navbarSupportedContent">
        <div class="navbar-nav align-self-stretch list-group min-vh-100">
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
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action active">Product</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action active">Product</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action active">Product</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>product/index" class="list-group-item list-group-item-action active">Product</a>
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
    <div class="container my-5 py-2">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Form Edit Product
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('product/update'); ?>" method="post">

                            <div>
                                <label class="form-label" for="product">Product Name</label>
                                <input class="form-control" type="text" name="product_name" placeholder="Product Name"
                                    value="<?= $product_name; ?>" id="product" required>
                            </div>
                            <div>
                                <label class="form-label" for="harga">harga</label>
                                <input class="form-control" id="harga" type="text" name="product_price"
                                    value="<?= $product_price; ?>" placeholder="Product Price" required>
                            </div>
                            <input type="hidden" name="product_code" value="<?= $product_code; ?>"
                                placeholder="Product code">

                            <button type="submit" class="btn btn-success float-end mt-2">Submit</button>
                            <a href="<?= site_url('product'); ?>" class="btn btn-primary float-end mt-2  me-2">
                                Batal</a>
                        </form>
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