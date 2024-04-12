<?php

session_start();
require('../action/manage_events_action.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Overview</title>
    <link rel="stylesheet" href="../css/index.css">
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
        <h1>Available Events</h1>
        <p>Discover and book tickets for the best events around you.</p>
       
        <p id="eventCount"><h1>Number of Events: <?php echo " ". count($res)  ?></h1></p> <!-- Placeholder for dynamic content -->
        
        <div class="events-grid">
        <?php
        foreach($res as $re){
           
        ?>
            <div class="event">
                <img src="<?php echo $re[2] ;?>" alt="Event <?php $re[0]; ?>">
                <h2 style="color: white;"><?php echo $re[1] . " " .  substr($re[3], 0, 4); ?> <br> <?php  echo $re[4]; ?></h2>
                <a href="../view/price_view.php?EventID=<?php echo $re[0]; ?>"> <!-- Update this href with the correct link -->
                   [Choose This Event] 

                </a>
            </div>
        
        <?php
            }
        ?>
        </div>
    
    </section>

    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>
