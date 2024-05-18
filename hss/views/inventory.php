<?php
session_start();
require_once('../models/db.php');
require_once('header.php');
require_once('sidebar.php');

$sql = "SELECT * FROM inventory";
$res = mysqli_query(conn(), $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .header {
            width: 85%;
            background-color: #fff;
            color: #333;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .content {
            width: 85%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content table th, .content table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .content table th {
            background-color: #f4f4f4;
        }
        .actions a {
            margin: 0 5px;
            text-decoration: none;
            color: #007bff;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function confirmDelete(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                window.location.href = '../controllers/deleteproduct.php?id=' + productId;
            }
        }
    </script>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Product Inventory</h2>
        <h4 align='right'><a href="newproduct.php">Add New Product</a></h4>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td><img src="data:image/jpeg;base64,<?php echo $r['pimage']; ?>" alt="Product Image" width="50"></td>
                    <td><?php echo $r['pid']; ?></td>
                    <td><?php echo $r['pname']; ?></td>
                    <td><?php echo $r['ptype']; ?></td>
                    <td><?php echo $r['pquantity']; ?></td>
                    <td><?php echo $r['pprice']; ?></td>
                    <td class="actions">
                        <a href="editproduct.php?id=<?php echo $r['pid']; ?>">Edit</a>
                        <a href="javascript:void(0);" onclick="confirmDelete('<?php echo $r['pid']; ?>')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
