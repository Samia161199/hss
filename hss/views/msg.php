<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Box</title>
    <style>
        .msg-box {
            background-color: #f0f0f0; /* Light gray background color */
            border-radius: 5px;
            border: 1px solid gray; /* Add border */
        }

    </style>
</head>
<body>

<div class="msg-box">
    <?php
    if (isset($_SESSION['msg'])) {
        echo "<p>{$_SESSION['msg']}</p>";
        unset($_SESSION['msg']);
    }
    ?>
</div>

</body>
</html>
