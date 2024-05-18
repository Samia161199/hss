<?php
require_once('logo.php');?>

<div class="sidebar">
    
    <br><h3>Dashboard</h3>
    <ul>
        <li class="option">
        <li><a href="overview.php">Overview</a></li><br><br>
        <li><a href="#">Inventory</a></li><hr><br>
        <li><a href="inventory.php"> - All products</a></li><br>
        <li><a href="newproduct.php"> - Add products</a></li><br><br>
        <li><a href="order.php">Order</a></li><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        </li>
    </ul>
</div>

<style>
    .sidebar {
    float: left;
    width: 15%; /* Adjust the width as needed */
    background-color: white;
    padding: 20px;
    box-sizing: border-box;
    border: 1px solid #ddd; /* Add border */
    border-color: #ddd; /* Specify border color */
}


    .sidebar h2 {
        margin-top: 0;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        margin-bottom: 10px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #333;
    }

    .option {
        background-color: white; /* Light gray background color */
    }
    .option button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 16px;
        color: #333;
        text-decoration: none;
        text-align: left;
    }
</style>

