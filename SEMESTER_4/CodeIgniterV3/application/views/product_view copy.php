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
    <title>Product View</title>

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
        <h1>Product View</h1>

        <!-- <a href="<?= site_url(''); ?>" class="btn btn-primary">Home</a> -->
        <a href="<?= site_url('product/add_new'); ?>" class="btn btn-primary mb-3">Tambah
            Product</a>
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url() ?>product/index" method="post">
                    <div class="d-flex flex-column text-center mb-2">
                        <h3>Filter Product</h3>
                    </div>
                    <div class="d-flex flex-sm-row flex-column justify-content-around  px-3">
                        <div class="flex-fill">
                            <input type="text" name="searchCode" value="<?= $searchCode; ?>" class="form-control"
                                placeholder="Search Product Code">
                            <!-- <input type="submit" name="submitCode" value="submit" class="btn btn-primary"> -->
                        </div>
                        <div class="p-2"></div>
                        <div class="flex-fill">
                            <input type="text" name="searchName" value="<?= $searchName; ?>" class="form-control"
                                placeholder="Search Product Name">
                            <!-- <input type="submit" name="submitName" value="submit" class="btn btn-primary"> -->
                        </div>
                        <div class="p-2"></div>

                        <div class="flex-fill">
                            <input type="text" name="searchPrice" value="<?= $searchPrice; ?>" class="form-control"
                                placeholder="Search Product Price">
                        </div>

                    </div>
                    <div class="d-flex flex-column text-center mb-2 pt-3 px-3">
                        <input type="submit" name="search" value="Search" class="btn btn-primary">
                    </div>

                </form>

            </div>

            <div class="card-body">


                <div class="row justify-content-center mt-1">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                    <th>field 1</th>
                                    <th>field 2</th>
                                    <th>field 3</th>
                                    <th>field 4</th>
                                    <th>field 5</th>
                                    <th>field 6</th>
                                    <th>field 7</th>
                                    <th>field 8</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = $row + 1;
                                foreach ($product->result() as $row):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $count; ?>
                                        </td>
                                        <td>
                                            <?= $row->product_code; ?>
                                        </td>
                                        <td>
                                            <?= $row->product_name; ?>
                                        </td>
                                        <td>
                                            <?= number_format($row->product_price); ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('product/get_edit/' . $row->product_code); ?>"
                                                class="btn btn-warning">Update</a>
                                            <a href="<?= site_url('product/get_delete/' . $row->product_code); ?>"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                        <td>
                                            <?= $row->product_name; ?>
                                        </td>
                                        <td>
                                            <?= number_format($row->product_price); ?>
                                        </td>
                                        <td>
                                            <?= $row->product_name; ?>
                                        </td>
                                        <td>
                                            <?= number_format($row->product_price); ?>
                                        </td>
                                        <td>
                                            <?= $row->product_name; ?>
                                        </td>
                                        <td>
                                            <?= number_format($row->product_price); ?>
                                        </td>
                                        <td>
                                            <?= $row->product_name; ?>
                                        </td>
                                        <td>
                                            <?= number_format($row->product_price); ?>
                                        </td>
                                        <?php $count++; endforeach; ?>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-center">
                            Total Product =
                            <?= $totalRow; ?>
                        </h6>

                        <div>
                            <?= $pagination; ?>
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