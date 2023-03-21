<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">
    <title>Delete</title>
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
        <h3>Apakah kamu yakin menghapus <?= $product_name; ?> ?
        </h3>
        <form
            action="<?= site_url('product/delete/'. $product_code); ?>">
            <a href="<?= site_url('product'); ?>"
                class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-danger">Detele</button>

        </form>

        <script
            src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js">
        </script>
    </div>
</body>

</html>