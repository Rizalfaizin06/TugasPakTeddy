<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT Produk</title>
</head>

<body>
    <h1>Edit Product</h1>
    <div>
        <form
            action="<?= site_url('product/update'); ?>"
            method="post">

            <div>
                <label>Product Name</label>
                <input type="text" name="product_name"
                    value="<?= $product_name; ?>"
                    placeholder="Product Name">
            </div>
            <div>
                <label>harga</label>
                <input type="text" name="product_price"
                    value="<?= $product_price; ?>"
                    placeholder="Product Price">
            </div>
            <input type="hidden" name="product_code"
                value="<?= $product_code; ?>"
                placeholder="Product code">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>