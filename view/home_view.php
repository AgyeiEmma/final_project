<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>

    
    <header class="navbar">
        <button onclick="window.location.href='./index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button>
        <nav>
            <ul class="nav-links">
                <li><a href="./index_view.php">Home</a></li>
                <li><a href="./event_view.php">Events</a></li>
                <li><a href="./about_view.php">About</a></li>
                <li><a href="./contact_view.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Welcome to EventSeatBooker</h1>
        <p>Discover and book tickets for the best events around you.</p>
        <a href="./event_view.php" class="btn">Explore Events</a>
    </section>

    <!-- Login Form Container -->
    <div class="login-container">
        <form id="loginForm" action="../action/home_action.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <button type="submit" name="btn">Sign In</button>
        </form>
        <br>
        <p>Don't have an account? <span><a href="./register_view.php"> Register here</a></span></p> 
       
    </div>
    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="../js/home.js"></script> -->
</body>
</html>


