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
    <title>Add Purcase View</title>

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
            <a href="<?= base_url() ?>purcase/index" class="list-group-item list-group-item-action ">Purcase</a>
            <a href="<?= base_url() ?>purcase/add_new_purcase" class="list-group-item list-group-item-action active">Add
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
                                Form Tambah Purcase
                            </div>

                            <div class="card-body">
                                <form action="<?= site_url('purcase/save_purcase'); ?>" method="post">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="ACCOUNTNUM">Vendor</label>
                                            <select class="custom-select" id="ACCOUNTNUM" name="ACCOUNTNUM" required>
                                                <?php foreach ($vendor as $row): ?>
                                                    <?php
                                                    $vendor_id = $row->ACCOUNTNUM;
                                                    $vendor_name = $row->NAME;
                                                    $selected = ($vendor_id == $selected_vendor) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?= $vendor_id; ?>" <?= $selected; ?>><?= $vendor_name; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 d-flex align-items-end">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#ModalItems">
                                                Pilih Items
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-12">
                                            <?php if (!empty($checkout)): ?>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="row">
                                                                <th class="col-2">ID</th>
                                                                <th class="col-2">Item</th>
                                                                <th class="col-2">Harga</th>
                                                                <th class="col-2">Qty</th>
                                                                <th class="col-2">Sub Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($checkout as $row): ?>
                                                                <tr class="row">
                                                                    <td class="col-2">
                                                                        <?= $row->ITEMID; ?>
                                                                    </td>
                                                                    <td class="col-2">
                                                                        <?= $row->ITEMNAME; ?>
                                                                    </td>
                                                                    <td class="col-2">
                                                                        <?= $row->ITEMPRICE; ?><input type="hidden"
                                                                            name="PRICE<?= $row->INVENTTRANSID; ?>"
                                                                            id="PRICE<?= $row->INVENTTRANSID; ?>"
                                                                            value="<?= $row->ITEMPRICE; ?>"
                                                                            class="form-control PRICE-input">
                                                                    </td>
                                                                    <td class="col-2">
                                                                        <input type="number" min="1"
                                                                            name="QTY<?= $row->INVENTTRANSID; ?>"
                                                                            id="QTY<?= $row->INVENTTRANSID; ?>"
                                                                            class="form-control qty-input" value="1">
                                                                    </td>
                                                                    <td class="col-2">
                                                                        <input type="number" min="1"
                                                                            name="subTotal<?= $row->INVENTTRANSID; ?>"
                                                                            class="form-control subTotal" value="0.00" readonly>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-right p-2">
                                                    <strong>
                                                        <p>Total: <span id="total"></span></p>
                                                    </strong>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <!-- <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="LINENUM">Line Number</label>
                                            <input type="number" class="form-control" id="LINENUM" name="LINENUM"
                                                min="0" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="QTYORDERED">Quantity Order</label>
                                            <input type="number" class="form-control" id="QTYORDERED" name="QTYORDERED"
                                                min="0" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="PURCHRECEIVEDNOW">Received Purcase</label>
                                            <input type="number" class="form-control" id="PURCHRECEIVEDNOW"
                                                name="PURCHRECEIVEDNOW" min="0" required>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="PURCHPRICE">Purcase Price</label>
                                            <input type="number" class="form-control" id="PURCHPRICE" name="PURCHPRICE"
                                                min="0" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="LINEAMOUNT">Line Amount</label>
                                            <input type="number" class="form-control" id="LINEAMOUNT" name="LINEAMOUNT"
                                                min="0" required>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="DELIVERYDATE">Delivery Date</label>
                                            <input type="date" class="form-control" id="DELIVERYDATE"
                                                name="DELIVERYDATE" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="PURCHSTATUS">Purcasing Status</label>
                                            <select class="custom-select" id="PURCHSTATUS" name="PURCHSTATUS" required>
                                                <option value="0">Pending</option>
                                                <option value="1">Done</option>

                                            </select>
                                        </div>

                                    </div> -->

                                    <div class="form-row justify-content-end">
                                        <a href="<?= site_url('Purcase'); ?>" class="btn btn-primary mr-2">
                                            Batal</a>
                                        <button class="btn btn-success" type="submit" name="addPurcase"
                                            value="addPurcase">Save
                                            Purcase</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalItems" tabindex="-1" role="dialog" aria-labelledby="ModalItemsTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pilih Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ITEMID">Item ID</label>
                                <input type="text" class="form-control" name="ITEMID" id="ITEMID">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ITEMNAME">Nama Item</label>
                                <input type="text" class="form-control" name="ITEMNAME" id="ITEMNAME">
                            </div>
                        </div>
                    </div>
                </div>
                <form action="<?= site_url('purcase/checkout_purcase'); ?>" method="post">
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Nama Item</th>
                                    <th>Harga</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $row): ?>
                                    <?php
                                    $isChecked = false;
                                    foreach ($checkout as $checkoutRow) {
                                        if ($row->ITEMID === $checkoutRow->ITEMID) {
                                            $isChecked = true;
                                            break;
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row->ITEMID; ?>
                                        </td>
                                        <td>
                                            <?= $row->ITEMNAME; ?>
                                        </td>
                                        <td>
                                            <?= $row->ITEMPRICE; ?>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="<?= $row->ITEMID; ?>"
                                                    id="<?= $row->ITEMID; ?>" value="<?= $row->ITEMID; ?>" <?php if ($isChecked)
                                                            echo 'checked'; ?>>
                                                <label class="form-check-label" for="<?= $row->ITEMID; ?>"></label>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="checkout" value="checkout" id="checkout"
                            class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/js/jquery.min.js">
    </script>
    <script>
        $(document).ready(function () {
            $('#ITEMID').on('keyup', function () {
                searchItems();
            });

            $('#ITEMNAME').on('keyup', function () {
                searchItems();
            });

            function searchItems() {
                var itemId = $('#ITEMID').val().toLowerCase();
                var itemName = $('#ITEMNAME').val().toLowerCase();

                $('tbody tr').filter(function () {
                    var idMatch = $(this).find('td:first-child').text().toLowerCase().indexOf(itemId) > -1;
                    var nameMatch = $(this).find('td:nth-child(2)').text().toLowerCase().indexOf(itemName) > -1;
                    $(this).toggle(idMatch && nameMatch);
                });
            }



            function calculateSubTotal(row) {
                var qty = parseInt(row.find('.qty-input').val());
                var price = parseFloat(row.find('td:eq(2)').text());
                console.log(row.find('td:eq(2)').text());
                var subtotal = qty * price;
                row.find('.subTotal').val(subtotal);
            }

            function calculateTotal() {
                var total = 0;
                $('.subTotal').each(function () {
                    var subtotal = parseFloat($(this).val());
                    if (!isNaN(subtotal)) {
                        total += subtotal;
                    }
                });
                var formattedNumber = total.toLocaleString("id-ID", { style: "currency", currency: "IDR" });

                return formattedNumber;
            }

            $('.qty-input').each(function () {
                calculateSubTotal($(this).closest('tr'));
            });

            $(document).on('input', '.qty-input', function () {
                var row = $(this).closest('tr');
                calculateSubTotal(row);
                var total = calculateTotal();
                $('#total').text(total);
            });
            var selectedVendor = sessionStorage.getItem('selectedVendor') || '';

            if (selectedVendor !== '') {
                $('#ACCOUNTNUM').val(selectedVendor);
            }

            $('#ACCOUNTNUM').change(function () {
                var selectedValue = $(this).val();
                sessionStorage.setItem('selectedVendor', selectedValue);
            });
        });
    </script>

    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="<?= base_url() ?>assets/js/script.js">
    </script>
</body>

</html>