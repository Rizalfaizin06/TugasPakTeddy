<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">
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
                    <a class="nav-link" aria-current="page"
                        href="<?= base_url() ?>">Home</a>
                    <a class="nav-link"
                        href="<?= base_url() ?>index.php/product/index">Product</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <h1>Product View</h1>
        <a href="<?= site_url('product/add_new'); ?>"
            class="btn btn-primary">Tambah
            Product</a>

        <div class="row mt-3">
            <div class="col-md-6">
                <form
                    action="<?= base_url() ?>index.php/product/index"
                    method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="search"
                            value="<?= $search; ?>"
                            class="form-control">
                        <input type="submit" name="submit" value="submit" class="btn btn-primary">
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
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $count = $row +1;
            foreach ($product->result() as $row):
            ?>
                        <tr>
                            <td><?= $count;?>
                            </td>
                            <td><?= $row->product_name;?>
                            </td>
                            <td><?= number_format($row->product_price);?>
                            </td>
                            <td>
                                <a href="<?= site_url('product/get_edit/'.$row->product_code); ?>"
                                    class="btn btn-warning">Update</a>
                                <a href="<?= site_url('product/get_delete/'.$row->product_code); ?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                            <?php $count++; endforeach;?>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <?= $pagination; ?>
                </div>

                <a href="<?= site_url(''); ?>"
                    class="btn btn-primary">Home</a>
            </div>
        </div>

    </div>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>