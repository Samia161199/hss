<?php

require_once('../models/validation.php');
require_once('../models/alldb.php');

$name = $_POST['name'];
$phone = $_POST['phone'];
$gmail = $_POST['gmail'];
$password = $_POST['password'];
$confirmpassword = $_POST['pass'];

if (validateRegistration($name, $phone, $gmail, $password, $confirmpassword)) {
    $status=gmailexistcheck($gmail);
    if($status){
        header("location:../views/reg.php");
        $_SESSION['msg']="The gmail is already exit.";
    }else{
        $status2=register($name, $phone, $gmail, $password);
        if ($status2) {
            header("location:../views/login.php");
        }else {
            header("location:../views/reg.php");
            $_SESSION['msg']="Sorry, Failed to register. Something went wrong";
        }
    }
}else {
    header("location:../views/reg.php");
    exit;
}

?>