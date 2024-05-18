<?php
session_start();
require_once('../models/db.php');

// Fetch product details to populate the form
if (isset($_GET['id'])) {
    $pid = $_GET['id'];
    $product = getProductById($pid);
    if (!$product) {
        $_SESSION['msg'] = "Product not found.";
        header("Location: ../views/inventory.php");
        exit;
    }
} else {
    $_SESSION['msg'] = "Invalid product ID.";
    header("Location: ../views/inventory.php");
    exit;
}

function getProductById($pid) {
    $con = conn();
    $sql = "SELECT * FROM inventory WHERE pid = '$pid'";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $product;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
            document.getElementById('editModal').style.display = 'block';
            <?php if (isset($_SESSION['msg'])): ?>
                alert("<?php echo $_SESSION['msg']; ?>");
                <?php unset($_SESSION['msg']); ?>
                window.location.href = '../views/inventory.php';
            <?php endif; ?>
        }
        function closeModal() {
            window.location.href = '../views/inventory.php';
        }
    </script>
</head>
<body>
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Product</h2>
            <form action="../controllers/editproduct.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="pid" value="<?php echo $product['pid']; ?>">
                <div>
                    <label for="pname">Product Name:</label>
                    <input type="text" id="pname" name="pname" value="<?php echo $product['pname']; ?>" required>
                </div>
                <div>
                    <label for="ptype">Product Type:</label>
                    <input type="text" id="ptype" name="ptype" value="<?php echo $product['ptype']; ?>" required>
                </div>
                <div>
                    <label for="pquantity">Product Quantity:</label>
                    <input type="number" id="pquantity" name="pquantity" value="<?php echo $product['pquantity']; ?>" required>
                </div>
                <div>
                    <label for="pp">Product Price:</label>
                    <input type="number" id="pp" name="pp" value="<?php echo $product['pprice']; ?>" required>
                </div>
                <div>
                    <label for="pimage">Product Image:</label>
                    <input type="file" id="pimage" name="pimage">
                </div>
                <button type="submit">Update Product</button>
            </form>
        </div>
    </div>
</body>
</html>
