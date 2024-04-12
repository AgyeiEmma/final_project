<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate Access Codes - EventSeatBooker</title>
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

<main>
    <h1>Generate Access Codes</h1>
    <form action="code_actions.php" method="post">
        <input type="hidden" name="action" value="generate">
        <label for="eventID">Select Event:</label>
        <select id="eventID" name="eventID" required>
            <?php
            // PHP code to list events as options
            ?>
        </select>
        <label for="numCodes">Number of Codes:</label>
        <input type="number" id="numCodes" name="numCodes" min="1" max="100" required>
        <button type="submit">Generate Codes</button>
    </form>
</main>

<footer>
<p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
</footer>
</body>
</html>