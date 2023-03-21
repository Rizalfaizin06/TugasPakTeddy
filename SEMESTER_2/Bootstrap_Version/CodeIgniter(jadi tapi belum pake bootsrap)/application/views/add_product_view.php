<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Produk</title>
</head>

<body>
    <h1>AddProduct</h1>
    <div>
        <form
            action="<?= site_url('product/save'); ?>"
            method="post">

            <div>
                <label>Product Name</label>
                <input type="text" name="product_name" placeholder="Product Name">
            </div>
            <div>
                <label>harga</label>
                <input type="text" name="product_price" placeholder="Product Price">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>