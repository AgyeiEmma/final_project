<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - EventSeatBooker</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="navbar">
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
        </nav>   </div>

    <section class="hero">
        <h1>Contact Us</h1>
        <p>Reach out for any inquiries or feedback.</p>
       <p><strong>LinkedIn:</strong> <a href="https://www.linkedin.com/company/eventseatbooker">eventseatbooker</a></p>
       <p><strong>Telephone:</strong> +233 505 863 7752</p>
            <p><strong>Email:</strong> info@eventseatbooker.com</p>
            <div class="social-media-links">
                <a href="https://twitter.com/eventseatbooker"> <img src="../images/x.png" alt="Twitter"></a>
                <a href="https://facebook.com/eventseatbooker"><img src="../images/facebook.png" alt="Facebook"></a>
                <a href="https://instagram.com/eventseatbooker"><img src="../images/instagram.png" alt="Instagram"></a>
            </div>
            </section>
    <section class="about">
        <div class="contact-info">
            
        </div>
        
    </section>

    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>
