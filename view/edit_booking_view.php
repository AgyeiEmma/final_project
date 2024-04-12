<?php
// Assuming you have a booking ID from a GET request
require_once '../setting/connection.php';

$BookingID = $_GET['BookingID'] ?? '';

if (!$BookingID) {
    echo "Booking ID is required.";
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM Bookings WHERE BookingID = ?");
$stmt->execute([$BookingID]);
$booking = $stmt->fetch();

if (!$booking) {
    echo "Booking not found";
    exit;
}

// Assuming you fetch events and users for dropdowns
$events = $pdo->query("SELECT EventID, EventName FROM Events")->fetchAll();
$users = $pdo->query("SELECT UserID, Name FROM Users")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
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

    <h1>Edit Booking</h1>
    <form action="booking_actions.php" method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="BookingID" value="<?= $BookingID ?>">

        <label for="event">Event:</label>
        <select id="event" name="eventID">
            <?php foreach ($events as $event): ?>
                <option value="<?= $event['EventID'] ?>" <?= $event['EventID'] == $booking['EventID'] ? 'selected' : '' ?>><?= htmlspecialchars($event['EventName']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="user">User:</label>
        <select id="user" name="userID">
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['UserID'] ?>" <?= $user['UserID'] == $booking['UserID'] ? 'selected' : '' ?>><?= htmlspecialchars($user['Name']) ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Add more fields as necessary -->

        <button type="submit">Update Booking</button>
    </form>
    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>