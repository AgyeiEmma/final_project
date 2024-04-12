<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <header class="navbar">
        <button onclick="window.location.href='../view/index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button>
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
    
    <div class="form-container">
        <form action="" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="password-confirm">Retype Password:</label>
            <input type="password" id="password-confirm" name="password_confirm" placeholder="Retype your password" required>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="./home_view.php">Login here</a></p>
    </div>
    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>

    <script src="../js/register.js"></script>
    
</body>
</html>