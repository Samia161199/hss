<?php
session_start();
require_once('../models/validation.php');
require_once('../models/alldb.php');


$gmail = $_POST['gmail'];
$password = $_POST['password'];

if (validateLogin($gmail, $password)) {
    $status=gmailexistcheck($gmail);
	if (!$status) {
		header("location:../views/login.php");
	    $_SESSION['msg']="Gmail didn't found";
	}else{
		$status2=logcheck($gmail,$password);
		if (!$status2) {
			header("location:../views/login.php");
	        $_SESSION['msg']="Password didn't match";
		}else {
			$_SESSION['user'] = $gmail;
	        header("location:../views/overview.php");
			exit;
		}

	}
}else {
    header("location:../views/login.php");
    exit;
}
?>