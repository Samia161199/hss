<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden; /* Prevent scrolling */
            display: flex;
        }
        .background {
            flex: 1;
            background-image: url('images/background.jpg'); /* Adjust the path to your background image */
            background-size: 100% auto; /* Set background image width to 50% of screen width */
            background-position: left;
            background-repeat: no-repeat;
            height: 100%;
            position: relative;
            z-index: -1; /* Move background behind other content */
        }
        .content {
           flex: 1;
           padding: 20px;
           background-color: whitesmoke;
           text-align: center;
           overflow-y: auto; /* Allow scrolling in content area */
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="content">
        <h4 align='right' class="container">Already have an account? <br><a href="login.php"> Log in</a></h4>
        <br>
        <!-- logo -->
        <img src="images/logo.jpg" height="142" width="325" alt="logo"><br>

        <h1>Seller Central</h1>
        <h3>New! Welcome to our community of sellers.</h3>
        <!-- registration form -->
        <form action="../controllers/regCheckController.php" method="POST">
         <!--Display session message here-->
            <p><?php include 'msg.php'; ?></p>

            <table>
                <caption> <h2>Create your Account</h2></caption>
                <tr>
                    <td>Your name <br>
                    <input type="text" id="name" name="name" ></td>
                </tr>
                <tr>
                    <td>Phone <br>
                    <input type="tel" id="phone" name="phone">
                    </td>
                </tr>
                <tr>
                    <td>Email <br>
                    <input type="email" id="gmail" name="gmail" placeholder="example@gmail.com"></td>
                </tr>
                <tr>
                    <td>Password <br>
                    <input type="password" id="password" name="password" placeholder="At least 6 character"></td>
                </tr>
                <tr>
                    <td>Confirm password <br>
                    <input type="password" id="pass" name="pass" ></td>
                </tr>
                <tr>
                    <td><button type="submit" name="register">Continue</button></td>
                </tr>
            </table>
        </form>
        <p>By clicking continue, you agree to HSS <a href="https://www.ebay.com/help/policies/default/ebays-rules-policies?id=4205"> rules and policy</a>.</p>
    </div>
</body>
</html>
