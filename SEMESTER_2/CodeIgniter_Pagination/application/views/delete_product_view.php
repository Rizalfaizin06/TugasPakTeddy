<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>
    <h3>Klik Dibawah Untuk menghapus <?= $product_name; ?>
    </h3>
    <form
        action="<?= site_url('product/delete/'. $product_code); ?>">
        <button type="submit">Detele</button>
    </form>
</body>

</html>