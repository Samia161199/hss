<?php
session_start();
require_once('header.php');
require_once('sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
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

        .content form div {
            margin-bottom: 15px;
        }

        .content form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .content form input[type="text"],
        .content form input[type="number"],
        .content form input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .content form button {
            width: 100%;
            padding: 10px;
            background-color: #5b9bd5;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .content form button:hover {
            background-color: #4a8ac1;
        }
    </style>
    <script>
        window.onload = function() {
            <?php if (isset($_SESSION['msg'])): ?>
                var userChoice = confirm("<?php echo $_SESSION['msg']; ?>\n\nDo you want to add more products?");
                <?php unset($_SESSION['msg']); ?>
                if (!userChoice) {
                    window.location.href = 'inventory.php'; // Redirect to all products page
                }
            <?php endif; ?>
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Add New Product</h2>
        </div>
        <div class="content">
            <form action="../controllers/addproduct.php" method="post" enctype="multipart/form-data">
                
                <div>
                    <label for="pname">Product Name:</label>
                    <input type="text" id="pname" name="pname" required>
                </div>
                <div>
                    <label for="ptype">Product Type:</label>
                    <input type="text" id="ptype" name="ptype" required>
                </div>
                <div>
                    <label for="pquantity">Product Quantity:</label>
                    <input type="number" id="pquantity" name="pquantity" required>
                </div>
                <div>
                    <label for="pp">Product Price:</label>
                    <input type="number" id="pp" name="pp" required>
                </div>
                <div>
                    <label for="pimage">Product Image:</label>
                    <input type="file" id="pimage" name="pimage" required>
                </div>
                <button type="submit">Add Product</button>
            </form>
        </div>
    </div>
</body>
</html>
