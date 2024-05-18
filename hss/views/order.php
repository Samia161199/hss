<?php
session_start();
require_once('../models/db.php');
require_once('header.php');
require_once('sidebar.php');

// Update order status if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $update_sql = "UPDATE order_requests SET status = '$status' WHERE id = $order_id";
    mysqli_query(conn(), $update_sql);
}

// Fetch order requests with user details
$sql = "
    SELECT 
        order_requests.id AS order_id,
        users.name AS user_name,
        users.phone AS user_phone,
        users.email AS user_email,
        users.address AS user_address,
        order_requests.quantity,
        order_requests.request_date,
        order_requests.status
    FROM order_requests
    JOIN users ON order_requests.user_id = users.id
";
$res = mysqli_query(conn(), $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f9f9f9;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9e9e9;
        }

        td .actions {
            display: flex;
            justify-content: center;
        }

        td button {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #5b9bd5;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        td button:hover {
            background-color: #4a8ac1;
        }

        td form {
            display: inline-block;
            margin: 0;
        }

        td form select {
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
        }
    </style>
    <title>Order Requests</title>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Order Requests</h2>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Request Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td><?php echo $r['user_name']; ?></td>
                    <td><?php echo $r['user_phone']; ?></td>
                    <td><?php echo $r['user_email']; ?></td>
                    <td><?php echo $r['user_address']; ?></td>
                    <td><?php echo $r['request_date']; ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="order_id" value="<?php echo $r['order_id']; ?>">
                            <select name="status" onchange="this.form.submit()">
                                <option value="Pending" <?php if ($r['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                <option value="Processed" <?php if ($r['status'] == 'Processed') echo 'selected'; ?>>Processed</option>
                                <option value="Completed" <?php if ($r['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                                <option value="Cancelled" <?php if ($r['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                            </select>
                        </form>
                    </td>
                    <td class="actions">
                        <button onclick="viewOrder(<?php echo $r['order_id']; ?>)">View</button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function viewOrder(orderId) {
    window.location.href = 'view_order.php?id=' + orderId;
}
</script>

</body>
</html>
