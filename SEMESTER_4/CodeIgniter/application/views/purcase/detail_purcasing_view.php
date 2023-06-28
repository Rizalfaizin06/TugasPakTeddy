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
    <title>Purcase View</title>

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
            <a href="<?= base_url() ?>purcase/index" class="list-group-item list-group-item-action active">Purcase</a>
            <a href="<?= base_url() ?>purcase/add_new_purcase" class="list-group-item list-group-item-action">Add
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
            <a href="<?= base_url() ?>VendorController/index" class="list-group-item list-group-item-action">Vendor</a>
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
            <a href="<?= base_url() ?>Items/index" class="list-group-item list-group-item-action">Items</a>
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

        <div class="col overflow-auto p-0 m-0 vh-100">
            <nav class="navbar navbar-light bg-light">
                <button class="navbar-toggler" id="toggleNav" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url() ?>">Rizal's Company Lab</a>
            </nav>
            <div class="container">



                <!-- <div class="row">
                    <div class="col-3 p-0 pl-5">
                        <div>
                            <h4>Detail Invoice</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="btn-group mb-3 p-0">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Export
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" target="_blank" href="<?= site_url('Purcase/pdf'); ?>">PDF</a>
                                <a class="dropdown-item" href="<?= site_url('Purcase/excel'); ?>">EXCEL</a>
                            </div>
                        </div>
                    </div>

                </div> -->















                <div class="container mt-3 mb-4  ">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h2>
                                        <?= $purcase[0]->NAME; ?>
                                    </h2>
                                    <p class="fs-sm">
                                        This is the invoice for a purchasing of <strong id="totalAmount"></strong>
                                        to Rizal's Company Lab.
                                    </p>

                                    <!-- 
                                    <div class="border-top border-gray-200 pt-4 mt-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-muted mb-2">Invoice No.</div>
                                                <strong>
                                                    <?= $purcase[0]->PURCHID; ?>
                                                </strong>
                                            </div>
                                            <div class="col-md-6 text-md-end">
                                                <div class="text-muted mb-2">Purchase Status</div>
                                                <strong>
                                                    <?= $purcase[0]->PURCHSTATUS; ?>
                                                </strong>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="border-top border-gray-200 mt-4 py-4">
                                        <div class="row">

                                            <div class="col-md-6 text-md-end">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="text-muted mb-2">Invoice No.</div>
                                                        <strong>
                                                            <?= $purcase[0]->PURCHID; ?>
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col text-md-end">
                                                        <div class="text-muted mb-2">Delivery Date</div>
                                                        <strong>
                                                            <?= $purcase[0]->DELIVERYDATE; ?>
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col text-md-end">
                                                        <div class="text-muted mb-2">Purchase Status</div>
                                                        <strong>
                                                            <?= ($purcase[0]->PURCHSTATUS == 0) ? "Pending" : "Done"; ?>
                                                        </strong>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-muted mb-2">Details Buyer</div>
                                                <strong>
                                                    <?= $purcase[0]->NAME; ?>
                                                </strong>
                                                <p class="fs-sm">
                                                    <?= $purcase[0]->ADDRESS; ?>
                                                    <br>
                                                    <?= $purcase[0]->PHONE; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table border-bottom border-gray-200 mt-3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"
                                                            class="fs-sm text-dark text-uppercase-bold-sm px-0 p-1">Line
                                                            Number</th>
                                                        <th scope="col"
                                                            class="fs-sm text-dark text-uppercase-bold-sm text-end px-0 p-1">
                                                            Item Name</th>
                                                        <th scope="col"
                                                            class="fs-sm text-dark text-uppercase-bold-sm text-end px-0 p-1">
                                                            Item Price</th>
                                                        <th scope="col"
                                                            class="fs-sm text-dark text-uppercase-bold-sm text-end px-0 p-1">
                                                            Quantity</th>
                                                        <th scope="col"
                                                            class="fs-sm text-dark text-uppercase-bold-sm text-end px-0 p-1">
                                                            Subtotal</th>
                                                        <th scope="col"
                                                            class="fs-sm text-dark text-uppercase-bold-sm text-end px-0 p-1">
                                                            Received Now</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $PRICEAMOUNT = 0;
                                                    foreach ($purcase as $row):
                                                        ?>
                                                        <tr>
                                                            <td class="p-1">
                                                                <?= $row->LINENUM; ?>
                                                            </td>
                                                            <td class="p-1">
                                                                <?= $row->ITEMNAME; ?>
                                                            </td>
                                                            <td class="p-1">
                                                                <?= $row->PURCHPRICE; ?>
                                                            </td>
                                                            <td class="p-1">
                                                                <?= $row->QTYORDERED; ?>
                                                            </td>
                                                            <td class="p-1">
                                                                <?= $row->LINEAMOUNT;
                                                                $PRICEAMOUNT += $row->LINEAMOUNT; ?>
                                                            </td>
                                                            <td class="p-1">
                                                                <?= $row->PURCHRECEIVEDNOW; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mt-5">
                                            <!-- <div class="d-flex justify-content-end">
                                                <p class="text-muted me-3">Total :</p>
                                                <span>
                                                    <?= $PRICEAMOUNT; ?>
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <p class="text-muted me-3">Discount:</p>
                                                <span>-$40.00</span>
                                            </div> -->
                                            <div class="d-flex justify-content-end mt-3">
                                                <h5 class="me-3">Total : </h5>
                                                <h5 class="text-success">
                                                    <?= $PRICEAMOUNT; ?>
                                                </h5>
                                            </div>
                                        </div>
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

        <script>
            $(document).ready(function () {
                var total = <?= $PRICEAMOUNT ?>; // Assuming $total is the PHP variable containing the value
                $('#totalAmount').text('Rp.' + total);
            });
        </script>
        <script src="<?= base_url() ?>assets/js/script.js">
        </script>
</body>

</html>