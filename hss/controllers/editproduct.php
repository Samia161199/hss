<?php
session_start();
require_once('../models/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $ptype = $_POST['ptype'];
    $pquantity = $_POST['pquantity'];
    $pprice = $_POST['pp'];

    // Check if image file is uploaded
    if (isset($_FILES['pimage']) && $_FILES['pimage']['error'] == 0) {
        // Handle file upload and convert to Base64
        $imageData = file_get_contents($_FILES['pimage']['tmp_name']);
        $base64Image = base64_encode($imageData);
    } else {
        // If no new image is uploaded, keep the existing image
        $existingProduct = getProductById($pid);
        $base64Image = $existingProduct['pimage'];
    }

    // Update product in the database
    $status = updateProduct($pid, $pname, $ptype, $pquantity, $pprice, $base64Image);
    if ($status) {
        $_SESSION['msg'] = "Product updated successfully.";
    } else {
        $_SESSION['msg'] = "Something went wrong. Failed to update product.";
    }

    header("Location: ../views/editproduct.php?id=$pid");
    exit;
}

function getProductById($pid) {
    $con = conn();
    $sql = "SELECT * FROM inventory WHERE pid = '$pid'";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $product;
}

function updateProduct($pid, $pname, $ptype, $pquantity, $pprice, $pimage) {
    $con = conn();
    $sql = "UPDATE inventory SET pname = '$pname', ptype = '$ptype', pquantity = '$pquantity', pprice = '$pprice', pimage = '$pimage' WHERE pid = '$pid'";
    $status = mysqli_query($con, $sql);
    mysqli_close($con);
    return $status;
}
?>
