<?php
    require('../setting/connection.php');

    $id = $_GET['EventID'];
    //Fetch one event
    $sql = "SELECT * FROM events WHERE EventID = '$id'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Event</title>
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
            </ul>
        </nav>
    </header>

    <h1>Edit Event</h1>
    <form action="../action/edit_event.php" method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="EventID" value="<?php echo $res['EventID']; ?>">
        
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventName" name="eventName" required value="<?php  echo $res['EventName']; ?>">
        
        <label for="eventDate">Event Date:</label>
        <input type="date" id="eventDate" name="eventDate" required value="<?php echo $res['EventDate']; ?>">
        
        <label for="venue">Venue:</label>
        <input type="text" id="venue" name="venue" required value="<?php  echo $res['Venue']; ?>">
        
        <button type="submit" name="editbtn">Update Event</button>
    </form>

    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>