<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking System</title>
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

                <?php
                    if (isset($_SESSION['UserID'])){
                ?>
                <li><div style="display: flex;"><a href="../action/logout.php">Logout </a><p style="font-size: small; color: gray; text-decoration: underline;">(<?php echo $_SESSION['email']; ?>)</p></div></li>
                <?php
                    }else{
                ?>
                  <li><a href="home_view.php">Login</a></li>

                <?php
                    }
                ?>
            </ul>
        </nav>
    </header>
    
    <section class="hero">
        <h1>Welcome to EventSeatBooker</h1>
        <p>Discover and book tickets for the best events around you.</p>
        <a href="../view/event_view.php" class="btn">Explore Events</a>
    </section>
    
    <!-- About Us section is now part of a modal -->
    <div id="aboutModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>About Us</h2>
            <p>Welcome to SeatSelect, your premier online destination for event seat booking!...</p>
        </div>
    </div>
    
    <section class="featured-events">
        
    </section>
    
    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
    <div class="overlay" id="overlay"></div>

    <script src="../index.js"></script>
</body>
</html>
