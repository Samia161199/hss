<?php
session_start();
require_once('../models/db.php');

if (isset($_GET['id'])) {
    $pid = $_GET['id'];

    if (deleteProduct($pid)) {
        $_SESSION['msg'] = "Product deleted successfully.";
    } else {
        $_SESSION['msg'] = "Failed to delete the product.";
    }
} else {
    $_SESSION['msg'] = "Invalid product ID.";
}

header("Location: ../views/inventory.php");
exit;

function deleteProduct($pid) {
    $con = conn();
    $sql = "DELETE FROM inventory WHERE pid = '$pid'";
    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        return true;
    } else {
        mysqli_close($con);
        return false;
    }
}
?>
