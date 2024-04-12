<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
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
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Payment Options</h1>
        <p>Select your preferred payment method.</p>
    </section>

    <section class="payment-plans">
        <div class="payment-container">
            <div class="payment-option">
                <img src='./images/paypal.png' alt="PayPal">
                <button onclick="window.location.href='paypal_checkout.html';" class="btn">Pay with PayPal</button>
            </div>
            <div class="payment-option">
                <img src="./images/creditcard.png" alt="Credit Card">
                <button onclick="window.location.href='creditcard_checkout.html';" class="btn">Pay with Credit Card</button>
            </div>
            <div class="payment-option">
                <img src="./images/mastercard.png" alt="MasterCard">
                <button onclick="window.location.href='mastercard_checkout.html';" class="btn">Pay with MasterCard</button>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>
