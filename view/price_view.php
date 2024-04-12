<?php
    session_start();
    require('../setting/connection.php');

    $id = $_GET['EventID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Pricing</title>
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

    <main>
        <section class="pricing-section">
            <h1>Seat Pricing</h1>
            <div class="pricing-container">
                <div class="price-card">
                <!-- Link to booking page for regular seat -->
                    <h2>Regular Seat</h2>
                    <p class="price">$50</p>
                    <p>Standard seating with great visibility.</p><br/>
                    <a href="booking_page.php?EventID=<?php echo $id; ?>&Seat=<?php echo 'Regular'; ?>&Price=<?php echo '$50'; ?>">[Choose This Seat]</a>
                </div>
                
                <div class="price-card"> <!-- Link to booking page for VIP seat -->
                    <h2>VIP Seat</h2>
                    <p class="price">$100</p>
                    <p>Enjoy the event in the best seats with premium services.</p>
                    <a href="booking_page.php?EventID=<?php echo $id; ?>&Seat=<?php echo 'VIP'; ?>&Price=<?php echo '$100'; ?>">[Choose This Seat]</a>

                </div>

                <div class="price-card"> <!-- Link to booking page for family package -->
                    <h2>Family Package</h2>
                    <p class="price">$180</p>
                    <p>A package of 4 seats with special amenities for the family.</p>
                    <a href="booking_page.php?EventID=<?php echo $id; ?>&Seat=<?php echo 'Family'; ?>&Price=<?php echo '$180'; ?>">[Choose This Seat]</a>

                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>
