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
            <a class="navbar-brand" href="<?= base_url() ?>">Testing
                CodeIgniter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="<?= base_url() ?>">Home</a>
                    <a class="nav-link" href="<?= base_url() ?>product/index">Product</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <h1>Product View</h1>
        <a href="<?= site_url('product/add_new'); ?>" class="btn btn-primary">Tambah
            Product</a>

        <div class="row g-3 mt-3">

            <div class="col">
                <form action="<?= base_url() ?>product/index" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="searchCode" value="<?= $searchCode; ?>" class="form-control"
                            placeholder="Search Product Code">
                        <input type="submit" name="submitCode" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col">
                <form action="<?= base_url() ?>product/index" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="searchName" value="<?= $searchName; ?>" class="form-control"
                            placeholder="Search Product Name">
                        <input type="submit" name="submitName" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col">
                <form action="<?= base_url() ?>product/index" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="searchPrice" value="<?= $searchPrice; ?>" class="form-control"
                            placeholder="Search Product Price">
                        <input type="submit" name="submitPrice" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>



        <div class="row mt-1">
            <div class="col-md-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Action</th>
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
                                <?php $count++; endforeach; ?>
                        </tr>
                    </tbody>
                </table>
                <div class="mb-3">
                    <h6>
                        Total Product =
                        <?= $totalRow; ?>
                    </h6>
                </div>
                <div>
                    <?= $pagination; ?>
                </div>

                <a href="<?= site_url(''); ?>" class="btn btn-primary">Home</a>
            </div>
        </div>

    </div>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>