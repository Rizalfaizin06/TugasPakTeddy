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
    <title>items View</title>

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
            <a href="<?= base_url() ?>items/index" class="list-group-item list-group-item-action active">items</a>


            <div id="accordion">
                <div class="card">
                    <div class="list-group-item list-group-item-action btn btn-link text-left text-reset text-decoration-none"
                        id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        Export
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <a href="<?= base_url('Export/pdf') ?>" target="_blank"
                            class="list-group-item list-group-item-action">PDF</a>
                        <a href="<?= base_url('Export/excel') ?>"
                            class="list-group-item list-group-item-action">EXCEL</a>
                    </div>
                </div>

            </div>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>items/index" class="list-group-item list-group-item-action active">items</a>
            <div id="accordion">
                <div class="card">
                    <div class="list-group-item list-group-item-action btn btn-link text-left text-reset text-decoration-none"
                        id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        Export
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <a href="<?= base_url('Export/pdf') ?>" target="_blank"
                            class="list-group-item list-group-item-action">PDF</a>
                        <a href="<?= base_url('Export/excel') ?>"
                            class="list-group-item list-group-item-action">EXCEL</a>
                    </div>
                </div>

            </div>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>items/index" class="list-group-item list-group-item-action active">items</a>
            <div id="accordion">
                <div class="card">
                    <div class="list-group-item list-group-item-action btn btn-link text-left text-reset text-decoration-none"
                        id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        Export
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <a href="<?= base_url('Export/pdf') ?>" target="_blank"
                            class="list-group-item list-group-item-action">PDF</a>
                        <a href="<?= base_url('Export/excel') ?>"
                            class="list-group-item list-group-item-action">EXCEL</a>
                    </div>
                </div>

            </div>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Home</a>
            <a href="<?= base_url() ?>items/index" class="list-group-item list-group-item-action active">items</a>
            <div id="accordion">
                <div class="card">
                    <div class="list-group-item list-group-item-action btn btn-link text-left text-reset text-decoration-none"
                        id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        Export
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <a href="<?= base_url('Export/pdf') ?>" target="_blank"
                            class="list-group-item list-group-item-action">PDF</a>
                        <a href="<?= base_url('Export/excel') ?>"
                            class="list-group-item list-group-item-action">EXCEL</a>
                    </div>
                </div>

            </div>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Transaction History</a>
            <a href="<?= base_url() ?>" class="list-group-item list-group-item-action">Logout</a>
        </div>

        <div class="col overflow-auto p-0 m-0 vh-100">
            <nav class="navbar navbar-light bg-light">
                <button class="navbar-toggler" id="toggleNav" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url() ?>">Rizal's Company Lab</a>
            </nav>
            <div class="container">
                <h1>Purcase View</h1>

                <!-- <a href="<?= site_url(''); ?>" class="btn btn-primary">Home</a> -->
                <!-- <a href="<?= site_url('purcase/add_new_purcase'); ?>" class="btn btn-primary mb-3">Tambah
                    Purcase</a> -->
                <a href="<?= site_url('Items/add_new_items'); ?>" class="btn btn-primary mb-3">Tambah
                    items</a>
                <!-- <a href="<?= site_url('purcase/add_new_items'); ?>" class="btn btn-primary mb-3">Tambah
                    Items</a> -->
                <!-- <a href="<?= site_url('Export'); ?>" target="_blank" class="btn btn-warning mb-3">Export items</a> -->
                <!-- Example single danger button -->
                <div class="btn-group mb-3">
                    <button type="button" class="btn btn-warning dropdown-toggle " data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Export
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" target="_blank" href="<?= site_url('Export/pdf'); ?>">PDF</a>
                        <a class="dropdown-item" href="<?= site_url('Export/excel'); ?>">EXCEL</a>
                    </div>
                </div>




                <div class="card">
                    <div class="card-header">
                        <form action="<?= base_url() ?>items/index" method="post">
                            <div class="d-flex flex-column text-center mb-2">
                                <h3>Filter items</h3>
                            </div>
                            <div class="d-flex flex-sm-row flex-column justify-content-around">
                                <div class="flex-fill">
                                    <input type="text" name="searchCode" value="<?= $searchCode; ?>"
                                        class="form-control" placeholder="Search items Code">
                                    <!-- <input type="submit" name="submitCode" value="submit" class="btn btn-primary"> -->
                                </div>
                                <div class="p-2"></div>
                                <div class="flex-fill">
                                    <input type="text" name="searchName" value="<?= $searchName; ?>"
                                        class="form-control" placeholder="Search items Name">
                                    <!-- <input type="submit" name="submitName" value="submit" class="btn btn-primary"> -->
                                </div>
                                <div class="p-2"></div>

                                <div class="flex-fill">
                                    <input type="text" name="searchPrice" value="<?= $searchPrice; ?>"
                                        class="form-control" placeholder="Search items Price">
                                </div>

                            </div>
                            <div class="d-flex flex-column text-center mb-2 pt-3 px-3">
                                <input type="submit" name="search" value="Search" class="btn btn-primary">
                            </div>

                        </form>

                    </div>

                    <div class="card-body">
                        <div class="row justify-content-center mt-1">
                            <div class="col-md-12 tblResponsive p-0 m-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Item ID</th>
                                            <th>Item Name</th>
                                            <th>Item Type</th>
                                            <th>Item Alias</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = $row + 1;
                                        foreach ($items->result() as $row):
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $count; ?>
                                                </td>

                                                <td>
                                                    <?= $row->ITEMID; ?>
                                                </td>
                                                <td>
                                                    <?= $row->ITEMNAME; ?>
                                                </td>
                                                <td>
                                                    <?= $row->ITEMTYPE; ?>
                                                </td>
                                                <td>
                                                    <?= $row->NAMEALIAS; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= site_url('Items/get_edit/' . $row->ITEMID); ?>"
                                                        class="btn btn-warning">Update</a>
                                                    <a href="<?= site_url('Items/get_delete/' . $row->ITEMID); ?> "
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php $count++; endforeach; ?>
                                    </tbody>
                                </table>


                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-center">
                                    Total items =
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