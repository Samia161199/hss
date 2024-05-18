<?php
require_once('db.php');


function gmailexistcheck($gmail){
    $sql = "SELECT * FROM sellers WHERE GMAIL = '$gmail'";
    $con = conn();
    $res = mysqli_query($con, $sql);
    $row = mysqli_num_rows($res);
    if($row==1){
        return true;
    }else {
        return false;
    }
}

function register($name, $phone, $gmail, $password){
    $sql = "INSERT INTO sellers (NAME, PHONE, GMAIL, PASSWORD) VALUES ('$name', '$phone', '$gmail', '$password')";
    $con = conn();
    $res = mysqli_query($con, $sql);
    if($res){
        return true;
    }else {
        return false;
    }
}



function logcheck($gmail,$password){
	$sql= "SELECT* FROM sellers WHERE GMAIL = '$gmail' and PASSWORD = '$password'";
	$con=conn();
	$res= mysqli_query($con,$sql);
	$row=mysqli_num_rows($res);
	if($row==1){
        return true;
    }else {
        return false;
    }
}

function getUserByEmail($gmail) {
    $con = conn();
    $sql = "SELECT * FROM sellers WHERE gmail = '$gmail'";
    $res = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($res);
    mysqli_close($con);
    return $user;
}


function resetpass($gmail,$password){
    $sql= "UPDATE sellers set PASSWORD = '$password' WHERE GMAIL = '$gmail'";
	$con=conn();
	$res= mysqli_query($con,$sql);
    if($res){
        return true;
    }else {
        return false;
    }
}

function inventory() {
    $sql = "SELECT * FROM products";
    $con = conn();
    $res = mysqli_query($con, $sql);
    $products = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $products[] = $row;
    }
    mysqli_free_result($res);
    mysqli_close($con);

    return $products;
}


function newproduct($pname, $ptype, $pquantity, $pprice, $pimage) {
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

function productexistcheck($pname,$ptype){
    $sql = "SELECT * FROM inventory WHERE pname=$pname AND ptype=$ptype";
    $con = conn();
    $res = mysqli_query($con, $sql);
    $row = mysqli_num_rows($res);
    if($row==1){
        return true;
    }else {
        return false;
    }
}



?>
