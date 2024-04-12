<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Venues - EventSeatBooker</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
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

<main>
    <h1>Venue Management</h1>
    <!-- Form to add new venue -->
    <section>
        <h2>Add New Venue</h2>
        <form action="venue_actions.php" method="post">
            <input type="hidden" name="action" value="create">
            <label for="venueName">Venue Name:</label>
            <input type="text" id="venueName" name="venueName" required>
            <label for="layout">Layout:</label>
            <textarea id="layout" name="layout" required></textarea>
            <button type="submit">Add Venue</button>
        </form>
    </section>
    
    <!-- List existing venues -->
    <section>
        <h2>Existing Venues</h2>
        <?php
        // PHP code to list venues
        ?>
    </section>
</main>
<a href="venue_actions.php?action=delete&venueID=<?= $venue['VenueID'] ?>" onclick="return confirm('Are you sure you want to delete this venue?');">Delete</a>
<footer>
<p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
</footer>
</body>
</html>