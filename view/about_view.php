<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About EventSeatBooker</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="navbar">
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
        </nav>    </div>

    <section class="hero">
        <h1>What We Do</h1>
        <p>EventSeatBooker is designed to connect event-goers with a variety of events, <br> providing an easy and secure way to book seats. <br> From concerts and sports events to conferences, we offer a seamless booking experience.</p>
    
    <class="featured-events">
        <h2>Successful Bookings</h2>
        <div class="events-grid">
            <div class="event">
                <img src="../images/burna.png" alt="Event 1">
                <h3>BurnaBoy at o2 arena 2022</h3>
            </div>
            <div class="event">
                <img src="../images/wwe.png" alt="Event 2">
                <h3>WWE Superstar 2023</h3>
            </div>
            <div class="event">
                <img src="../images/worldcup.png" alt="Event 3">
                <h3>worldcup final <br>Qatar 2022</h3>
            </div>
            <div class="event">
                <img src="../images/super.png" alt="Event 3">
                <h3>NFL Super Bowl 2024<br>Las Vegas USA</h3>
            </div>
            <div class="event">
                <img src="../images/boxing.png" alt="Event 3">
                <h3>African Clash 2024<br>Saudi Arabia </h3>
            </div>
            
        </div>
    </section>

    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>
