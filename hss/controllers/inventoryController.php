<?php
session_start();
require_once('../models/db.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the product ID and any updated information are provided
    if (isset($_POST['pid']) && isset($_POST['pname']) && isset($_POST['ptype']) && isset($_POST['pquantity']) && isset($_POST['pprice'])) {
        // Retrieve the product ID and updated information from the POST data
        $productId = $_POST['pid'];
        $productName = $_POST['pname'];
        $productType = $_POST['ptype'];
        $productQuantity = $_POST['pquantity'];
        $productPrice = $_POST['pprice'];

        // Update the product in the database
        $sql = "UPDATE inventory SET pname='$productName', ptype='$productType', pquantity='$productQuantity', pprice='$productPrice' WHERE pid='$productId'";
        $result = mysqli_query(conn(), $sql);

        if ($result) {
            // Product updated successfully
            $_SESSION['msg'] = "Product updated successfully.";
            header("Location: ../views/inventory.php");
            exit();
        } else {
            // Failed to update product
            $_SESSION['msg'] = "Failed to update product.";
            header("Location: ../views/inventory.php");
            exit();
        }
    } else {
        // Missing parameters
        $_SESSION['msg'] = "Missing parameters.";
        header("Location: ../views/inventory.php");
        exit();
    }
} else {
    // Invalid request method
    $_SESSION['msg'] = "Invalid request method.";
    header("Location: ../views/inventory.php");
    exit();
}
?>
