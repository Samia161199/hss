<?php
require_once('../models/alldb.php');
session_start();

$username = $_SESSION['username'];
$status = user($username);
if ($status) {
    header("Location: ../views/profile.php"); 
    exit; // Exit after redirection
} else {
    header("Location: ../views/dashboard.php"); 
}
?>
