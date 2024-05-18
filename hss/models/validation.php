<?php
session_start();

//registration
function validateRegistration($name, $phone, $gmail, $password, $confirmpassword) {
    if (empty($name) || empty($phone) || empty($gmail) || empty($password) || empty($confirmpassword)) {
        $_SESSION['msg'] = "Please fill in all fields.";
        return false;
    }

    if (strlen($phone) !== 11 || !preg_match("/^01[0-9]{9}$/", $phone)) {
        $_SESSION['msg'] = "Invalid phone number.Please enter a valid 11-digit number starting with '01'. ";
        return false;
    }

    if (strlen($password) < 6) {
        $_SESSION['msg'] = "Password must be at least 6 characters.";
        return false;
    }

    if ($confirmpassword != $password) {
        $_SESSION['msg'] = "Confirm password didn't match.";
        return false;
    }

    return true;
}

//login
function validateLogin($gmail, $password) {
    if (empty($gmail) || empty($password)) {
        $_SESSION['msg'] = "Please fill in all fields.";
        return false;
    }

    return true;
}

//reset
function validateReset($gmail, $password, $confirmpassword) {
    if (empty($gmail) || empty($password) || empty($confirmpassword)) {
        $_SESSION['msg'] = "Please fill in all fields.";
        return false;
    }
    if (strlen($password) < 6) {
        $_SESSION['msg'] = "Password must be at least 6 characters.";
        return false;
    }
    if ($confirmpassword != $password) {
        $_SESSION['msg'] = "Confirm password didn't match.";
        return false;
    }

    return true;
}
?>
