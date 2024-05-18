<?php 

function conn()
{
	$user = 'root';
    $pass = '';
    $db = 'hss';

    $conn = new mysqli('localhost', $user, $pass, $db) or die("Sorry, failed to connect.");
    return $conn;
}
?>
