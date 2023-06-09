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
        <div class="col overflow-auto p-0 m-0">
            <nav class="navbar navbar-light bg-light">
                <button class="navbar-toggler" id="toggleNav" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url() ?>">Rizal's Company Lab</a>
            </nav>
            <div class="container">
                <div class="row m-3 justify-content-center">
                    <div class="col col-md-8">
                        <div class="card">

                            <?php if (isset($error)): ?>
                                <p class="text-center text-danger pt-3">
                                    <?= $error ?>
                                </p>
                            <?php endif; ?>
                            <div class="card-header">
                                Delete This Purcase?
                            </div>

                            <div class="card-body">
                                <form action="<?= site_url('purcase/update_purcase'); ?>" method="post">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="ACCOUNTNUM">Vendor</label>
                                            <select class="custom-select" id="ACCOUNTNUM" name="ACCOUNTNUM" disabled
                                                disabled required>
                                                <?php
                                                foreach ($vendor as $row):
                                                    ?>
                                                    <option value="<?= $row->ACCOUNTNUM; ?>"
                                                        <?= ($row->ACCOUNTNUM == $ACCOUNTNUM) ? 'selected' : '' ?>><?= $row->NAME; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="ITEMID">Items</label>
                                            <select class="custom-select" id="ITEMID" name="ITEMID" disabled required>
                                                <?php
                                                foreach ($items as $row):
                                                    ?>
                                                    <option value="<?= $row->ITEMID; ?>" <?= ($row->ITEMID == $ITEMID) ? 'selected' : '' ?>><?= $row->ITEMNAME; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="LINENUM">Line Number</label>
                                            <input type="number" class="form-control" id="LINENUM" name="LINENUM"
                                                min="0" value="<?= $LINENUM; ?>" disabled required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="QTYORDERED">Quantity Order</label>
                                            <input type="number" class="form-control" id="QTYORDERED" name="QTYORDERED"
                                                value="<?= $QTYORDERED; ?>" min="0" disabled required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="PURCHRECEIVEDNOW">Received Purcase</label>
                                            <input type="number" class="form-control" id="PURCHRECEIVEDNOW"
                                                name="PURCHRECEIVEDNOW" value="<?= $PURCHRECEIVEDNOW; ?>" min="0"
                                                disabled required>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="PURCHPRICE">Purcase Price</label>
                                            <input type="number" class="form-control" id="PURCHPRICE" name="PURCHPRICE"
                                                value="<?= $PURCHPRICE; ?>" min="0" disabled required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="LINEAMOUNT">Line Amount</label>
                                            <input type="number" class="form-control" id="LINEAMOUNT" name="LINEAMOUNT"
                                                value="<?= $LINEAMOUNT; ?>" min="0" disabled required>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="DELIVERYDATE">Delivery Date</label>
                                            <input type="date" class="form-control" id="DELIVERYDATE"
                                                name="DELIVERYDATE" value="<?= $DELIVERYDATE; ?>" disabled required>
                                            <input type="hidden" class="form-control" id="INVENTTRANSID"
                                                name="INVENTTRANSID" value="<?= $INVENTTRANSID; ?>" disabled required>
                                            <input type="hidden" class="form-control" id="PURCHID" name="PURCHID"
                                                value="<?= $PURCHID; ?>" disabled required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="PURCHSTATUS">Purcasing Status</label>
                                            <select class="custom-select" id="PURCHSTATUS" name="PURCHSTATUS" disabled
                                                required>
                                                <option value="0" <?= ($PURCHSTATUS == 0) ? 'selected' : '' ?>>Pending
                                                </option>
                                                <option value="1" <?= ($PURCHSTATUS == 1) ? 'selected' : '' ?>>Done
                                                </option>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-row justify-content-end">
                                        <a href="<?= site_url('purcase'); ?>" class="btn btn-primary mr-2">
                                            Batal</a>
                                        <a href="<?= site_url('purcase/delete/' . $INVENTTRANSID . '/' . $PURCHID); ?> "
                                            class="btn btn-danger">Delete</a>
                                    </div>
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