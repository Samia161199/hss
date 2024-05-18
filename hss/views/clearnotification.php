<?php
session_start();
unset($_SESSION['msg']);
header("Location: notification.php");
exit;
?>
