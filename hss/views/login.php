<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
            background-size: cover; /* Set background image width to 50% of screen width */
            background-position: right;
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
        .input check{
            align-items: left;
        }

    </style>
       
    </head>
    <body>
        <div class="background"></div>
        <div class="content">
        <h4 align='right' class="container">Want to create a seller account?<br><a href="reg.php"> Sign up</a></h4>
        <br>
        <img src="images/logo.jpg" height="142" width="325" alt="logo"><br>
        <h1>Seller Central</h1>
            <form action="../controllers/logCheckController.php" method="POST">
                <!--Display session message here-->
                <p><?php include 'msg.php'; ?></p>
            
                <table>
                    <caption><h2>Get started selling on Jhotpot bazar</h2></caption>
                    <tr>
                        <td>Email <br>
                        <input type="email" id="gmail" name="gmail"placeholder="example@gmail.com"></td>
                </tr>
                <tr>
                <td>Password <br>
                <input type="password" id="password" name="password"placeholder="At least 6 character">
                </td>
                </tr>
                <tr>
                    <td><button type="submit" name="login">Login</button></td>
                </tr>
                <tr><td><a href="reset.php">Forgetten your password?</a></td></tr>
            </table>
            
        </form>
        </div>
    
    </body>
</html>
