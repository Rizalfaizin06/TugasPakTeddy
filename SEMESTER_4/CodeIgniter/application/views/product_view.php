<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Product View</title>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand text-dark" href="<?= base_url() ?>">Testing
                CodeIgniter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-secondary" aria-current="page" href="<?= base_url() ?>">Home</a>
                    <a class="nav-link text-secondary" href="<?= base_url() ?>product/index">Product</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Product View</h1>
        <!-- <a href="<?= site_url(''); ?>" class="btn btn-primary">Home</a> -->
        <a href="<?= site_url('product/add_new'); ?>" class="btn btn-primary mb-3">Tambah
            Product</a>
        <form action="<?= base_url() ?>product/index" method="post">
            <div class="d-flex flex-column jumbotron justify-content-center">
                <div class="d-flex flex-column text-center mb-2">
                    <h3>Filter Product</h3>
                </div>
                <div class="d-flex flex-sm-row flex-column">
                    <div class="col">
                        <div class="flex-fill">
                            <input type="text" name="searchCode" value="<?= $searchCode; ?>" class="form-control"
                                placeholder="Search Product Code">
                            <!-- <input type="submit" name="submitCode" value="submit" class="btn btn-primary"> -->
                        </div>
                    </div>

                    <div class="col">

                        <div class="flex-fill">
                            <input type="text" name="searchName" value="<?= $searchName; ?>" class="form-control"
                                placeholder="Search Product Name">
                            <!-- <input type="submit" name="submitName" value="submit" class="btn btn-primary"> -->
                        </div>

                    </div>
                    <div class="col">

                        <div class="flex-fill">
                            <input type="text" name="searchPrice" value="<?= $searchPrice; ?>" class="form-control"
                                placeholder="Search Product Price">
                        </div>

                    </div>
                </div>
                <div class="d-flex flex-column text-center mb-2 pt-3 px-3">
                    <input type="submit" name="search" value="Search" class="btn btn-primary">
                </div>

            </div>
        </form>



        <div class="row justify-content-center mt-1">
            <div class="col-md-10 ">
                <table class="table table-responsive table-hover">
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

                <h6 class="row justify-content-center">
                    Total Product =
                    <?= $totalRow; ?>
                </h6>
                <div class="row justify-content-center">
                    <?= $pagination; ?>
                </div>


            </div>
        </div>

    </div>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>