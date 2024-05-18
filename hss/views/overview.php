<?php
session_start();
require_once('../models/db.php');
require_once('header.php');
require_once('sidebar.php');

// Fetch total quantity of all products
function getTotalProductQuantity() {
    $con = conn();
    $sql = "SELECT SUM(pquantity) as total_quantity FROM inventory";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $data['total_quantity'];
}

$totalQuantity = getTotalProductQuantity();
$newProductQuantity = isset($_SESSION['new_product_quantity']) ? $_SESSION['new_product_quantity'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
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
    margin: 20px auto; /* Center horizontally */
}

        .box {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <div class="header">
        <h2>Overview</h2>
        <div class="content">

            <div class="box">
                <p>Total Product Quantity: <?php echo $totalQuantity; ?></p>
            </div>
            <div class="box">
                <p>New Added Product Quantity: <?php echo $newProductQuantity; ?></p>
            </div>
        </div></div>
    </div>
</body>
</html>
