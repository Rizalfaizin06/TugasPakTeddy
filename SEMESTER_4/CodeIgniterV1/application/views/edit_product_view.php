<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">
    <title>EDIT Produk</title>
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

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Form Edit Product
                    </div>
                    <div class="card-body">
                        <form
                            action="<?= site_url('product/update'); ?>"
                            method="post">

                            <div>
                                <label class="form-label" for="product">Product Name</label>
                                <input class="form-control" type="text" name="product_name" placeholder="Product Name"
                                    value="<?= $product_name; ?>"
                                    id="product" required>
                            </div>
                            <div>
                                <label class="form-label" for="harga">harga</label>
                                <input class="form-control" id="harga" type="text" name="product_price"
                                    value="<?= $product_price; ?>"
                                    placeholder="Product Price" required>
                            </div>
                            <input type="hidden" name="product_code"
                                value="<?= $product_code; ?>"
                                placeholder="Product code">

                            <button type="submit" class="btn btn-success float-end mt-2">Submit</button>
                            <a href="<?= site_url('product'); ?>"
                                class="btn btn-primary float-end mt-2  me-2"> Batal</a>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>