
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<header>
    <nav class="header-nav">
        <ul align='right'>
            <li><a href="msg.php"><i class="fas fa-bell"></i>Notification</a></li>
            <li><a href="profile.php">Profile<i class="fas fa-user"></i> </a></li>
            <li><a href="login.php">Log out<i class="fas fa-sign-out-alt"></i></a></li>
           <li><a href="#">Settings<i class="fas fa-cog"></i></a></li>
        </ul>
    </nav>
</header>


<style>

.header {
        width: 100%;
        background-color: #fff;
        color: #333;
        padding: 10px;
        text-align: right;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid #ddd; /* Add bottom border */
    }
        .header-nav {
            display: flex; /* Use flexbox for horizontal alignment */
            justify-content: flex-end; /* Align items to the right */
        }

        .header-nav ul {
            list-style-type: none; /* Remove default list styles */
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox to display list items horizontally */
        }

        .header-nav ul li {
            margin-left: 10px; /* Add space between list items */
        }

        .header-nav ul li a {
            text-decoration: none; /* Remove underline from links */
            color: black; /* Set link color */
            display: flex; /* Use flexbox for link alignment */
            align-items: center; /* Align icon and text vertically */
            padding: 5px 10px; /* Add some padding for better click area */
            border-radius: 5px; /* Optional: add border-radius for rounded corners */
        }

        .header-nav ul li a i {
            margin-right: 8px; /* Add space between icon and text */
        }

        .header-nav ul li a:hover {
            font-weight: bold; /* Make the text bold */
            background-color: #f0f0f0; /* Highlight the background */
        }
    </style>
