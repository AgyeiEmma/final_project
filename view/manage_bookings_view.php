<?php
 session_start();

 require('../action/booking_actions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Bookings - EventSeatBooker</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<header class="navbar">
<div class="navbar">
        <button onclick="window.location.href='./index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button> 
        <nav>
            <ul class="nav-links">
                <li><a href="./index_view.php">Home</a></li>
                <li><a href="./event_view.php">Events</a></li>
                <li><a href="./about_view.php">About</a></li>
                <li><a href="./contact_view.php">Contact</a></li>
            </ul>
        </nav>   </div>
</header>

<main>
<section class="hero">
    <h1>Bookings Management</h1>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Event Name</th>
                <th>User</th>
                <th>Booking Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($resu as $re){
                    
            ?>
                <tr>
                    <td><?php echo $re[0]; ?></td>
                    <td><?php echo $re[1]; ?></td>
                    <td><?php echo $re[2]; ?></td>
                    <td><?php echo $re[3]; ?></td>
                    <td>
                             <a href=''>Edit</a> | 
                             <a href='' onclick="return confirm('Are you sure?')">Cancel</a>
                         </td>
                       </tr>
            <?php
              }
            ?>
        </tbody>
    </table>
            </section>
</main>

<footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>