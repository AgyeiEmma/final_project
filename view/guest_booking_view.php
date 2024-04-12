<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Booking - Event Booking System</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header class="navbar">
    <button onclick="window.location.href='./index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button>
        <nav>
            <ul class="nav-links">
                <li><a href="./home_ view.php">Home</a></li>
                <li><a href="./event_view.php">Events</a></li>
                <li><a href="./contact_view.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    
    <main class="guest-booking-form">
        <h2>Book Your Event</h2>
        <form id="bookingForm">
            <label for="eventName">Event:</label>
            <select id="eventName" name="eventName" required>
                <option value="">Select an event</option>
                <!-- Options should be dynamically generated based on available events -->
                <option value="event1">Event 1</option>
                <option value="event2">Event 2</option>
            </select>
            
            <label for="guestName">Name:</label>
            <input type="text" id="guestName" name="guestName" required>
            
            <label for="guestEmail">Email:</label>
            <input type="email" id="guestEmail" name="guestEmail" required>
            
            <label for="paymentMethod">Payment Method:</label>
            <select id="paymentMethod" name="paymentMethod" required>
                <option value="">Select a payment method</option>
                <option value="creditCard">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>
            
            <!-- Additional fields for payment details could be added here -->
            
            <button type="submit" class="btn">Submit Booking</button>
        </form>
    </main>
    
    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>

    <script src="./index.js"></script>
</body>
</html>
