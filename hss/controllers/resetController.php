<?php

require_once('../models/validation.php');
require_once('../models/alldb.php');

$gmail = $_POST['gmail'];
$password = $_POST['password'];
$confirmpassword = $_POST['pass'];

if (validateReset($gmail, $password, $confirmpassword)) {
    $status=gmailexistcheck($gmail);
    if(!$status){
        header("location:../views/reset.php");
        $_SESSION['msg']="The gmail didn't found.";
    }else{
        $status2=resetpass($gmail,$password);
        if ($status2) {
            header("location:../views/login.php");
        }else {
            header("location:../views/reset.php");
            $_SESSION['msg']="Sorry, Failed to reset. Something went wrong";
        }
    }
}else {
    header("location:../views/reset.php");
    exit;
}

?>