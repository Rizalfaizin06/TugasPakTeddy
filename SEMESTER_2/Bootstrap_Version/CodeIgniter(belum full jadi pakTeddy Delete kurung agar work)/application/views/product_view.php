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
            $count = 0;
            foreach ($product->result() as $row):
            $count++; ?>
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
                <?php endforeach;?>
            </tr>
        </tbody>
    </table>
</body>

</html>