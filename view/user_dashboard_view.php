<?php
require('../action/user_dashboard_action.php');

$userid = $_SESSION['UserID'];

//Fetch Bookings Details
$sql = "SELECT Users.Name, Events.EventName, Events.Venue, Bookings.Seat, Bookings.Price FROM Bookings
        JOIN Users ON Bookings.UserID = '$userid'
        JOIN Events ON Bookings.EventId = Events.EventID";

$result = mysqli_query($conn, $sql);
$resu = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Event Booking System</title>
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
    
    <section class="user-profile">
        <h2>My Profile</h2>
        <form id="profileForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['Name'];?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['Email']; ?>" required>
            
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" value="<?php echo $user['Phone']; ?>">
            
            <button type="submit" class="btn">Update Profile</button><span><a href="../action/logout.php" style="font-weight: bold; color: white;">Logout</a></span>
        </form>
    </section>
    
    <section class="booking-history">
        <h2>My Bookings</h2>
        <?php
          if (empty($resu)){
        ?>
        <!-- Dynamic content for bookings will be here. For demonstration, it's static. -->
        <p>No bookings found.</p>

        <?php

          }else{
        ?>
        <div style="display: flex;">
            <div style="margin-right: 20px;"> <?php echo $resu['Name']; ?></div>
            <div style="margin-right: 20px;"> <?php echo $resu['EventName']; ?></div>
            <div style="margin-right: 20px;"> <?php echo $resu['Venue']; ?></div>
            <div style="margin-right: 20px;"> <?php echo $resu['Seat']; ?></div>
            <div style="margin-right: 0;"> <?php echo $resu['Price']; ?> </div>
        </div>
        

        <?php
          }
          ?>
    </section>
    
    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>

    <script src="../index.js"></script>
</body>
</html>