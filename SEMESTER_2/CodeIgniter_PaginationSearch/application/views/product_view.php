<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <a
        href="<?= site_url('product/add_new'); ?>">Tambah
        Product</a>
    <form action="<?= base_url() ?>index.php/product/index"
        method="post">
        <input type="text" name="search" value="<?= $search; ?>">
        <input type="submit" name="submit" value="submit">
    </form>


    <table border="1" width="600">
        <thead>
            <tr>
                <th>#</th>
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
                    <a
                        href="<?= site_url('product/get_edit/'.$row->product_code); ?>">Update</a>
                    <a
                        href="<?= site_url('product/get_delete/'.$row->product_code); ?>">Delete</a>
                </td>
                <?php $count++; endforeach;?>
            </tr>
        </tbody>
    </table>
    <div>
        <?= $pagination; ?>
    </div>
    <a href="<?= site_url(''); ?>">Back
        to
        Index</a>
</body>

</html>