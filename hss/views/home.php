<?php
session_start();
require_once('../models/db.php');

$sql = "SELECT * FROM inventory";
$res = mysqli_query(conn(), $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our selling product </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .header {
            width: 85%;
            background-color: #fff;
            color: #333;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .content {
            width: 85%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content table th, .content table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .content table th {
            background-color: #f4f4f4;
        }
        .actions a {
            margin: 0 5px;
            text-decoration: none;
            color: #007bff;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="content">
        
        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <img src="data:image/jpeg;base64,<?php echo $r['pimage']; ?>" alt="Product Image" width="50">
            <br><?php echo $r['pid']; ?><br>
            <?php echo $r['pname']; ?><br>
            <?php echo $r['ptype']; ?><br>
            <?php echo $r['pquantity']; ?><br>
            <?php echo $r['pprice']; ?><br>
                    <div class="actions">
                        <a href="#">Chart</a>
                        Item<input type="number" style="width: 45px;">
                    
                 </div>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
