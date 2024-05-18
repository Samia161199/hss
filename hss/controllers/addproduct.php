<?php
session_start();
require_once('../models/db.php');

$pname = $_POST['pname'];
$ptype = $_POST['ptype'];
$pquantity = $_POST['pquantity'];
$pprice = $_POST['pp'];

// Handle file upload and convert to Base64
if (isset($_FILES['pimage']) && $_FILES['pimage']['error'] == 0) {
    $imageData = file_get_contents($_FILES['pimage']['tmp_name']);
    $base64Image = base64_encode($imageData);

    $status = newProduct($pname, $ptype, $pquantity, $pprice, $base64Image);
    if ($status) {
        $_SESSION['msg'] = "New product added successfully.";
        $_SESSION['new_product_quantity'] = $pquantity;  // Set the new product quantity
    } else {
        $_SESSION['msg'] = "Something went wrong. Failed to add new product.";
    }
} else {
    $_SESSION['msg'] = "Failed to upload image.";
}

header("Location: ../views/newproduct.php");
exit;

function newProduct($pname, $ptype, $pquantity, $pprice, $pimage) {
    $con = conn();
    $sql = "INSERT INTO inventory (pname, ptype, pquantity, pprice, pimage) VALUES ('$pname', '$ptype', '$pquantity', '$pprice', '$pimage')";
    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        return true;
    } else {
        mysqli_close($con);
        return false;
    }
}
?>
