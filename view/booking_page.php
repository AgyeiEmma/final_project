<?php
    session_start();

    require('../setting/connection.php');

    $id = $_GET['EventID'];
    $price = $_GET['Price'];
    $seat = $_GET['Seat'];
    //Fetch one event
    $sql = "SELECT * FROM Events WHERE EventID = '$id'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking System</title>
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
    <main>
        <section class="pricing-section">
            <h1>Event Booking Details</h1>
            <div class="pricing-container">
                <a class="price-card"><br> <!-- Link to booking page for regular seat -->
                <form action="../action/booking_actions.php" method="post">
                    <h3>Event Name:</h3> <p><?php echo $res['EventName']; ?></p>
                    <input type="hidden" name="EventID" value="<?php echo $res['EventID']; ?>">
                    <br/>
                    <h3>Venue:</h3> <p><?php echo $res['Venue']; ?></p>
                    <br/>
                    <h3>Date:</h3> <p><?php echo $res['EventDate']; ?></p>
                    <br/>
                    <h3>Price:</h3>
                    <p><?php echo $price; ?></p><br/>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <h3>Seat:</h3>
                    <p><?php echo $seat . " Seat "; ?></p>  
                    <input type="hidden" name="seat" value="<?php echo $seat; ?>">  
                    <input type="hidden" name="userid" value="<?php echo $_SESSION['UserID'] ?>">    
                    <br>           
                    <button type=submit name="bookbtn">Book & Pay</button>
                </form>
                    
                </a>
                
            </div>
        </section>
    </main>






    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
    <div class="overlay" id="overlay"></div>

    <script src="../index.js"></script>
</body>
</html