<?php
require('../action/manage_events_action.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Events</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header class="navbar">
        <button onclick="window.location.href='../view/index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button>
        <nav>
            <ul class="nav-links">
                <li><a href="./index_view.php"></a></li>
                <li><a href="./event_view.php"></a></li>
                <li><a href="./about_view.php"></a></li>
                <li><a href="./contact_view.php"></a></li>

                <?php
                    if (isset($_SESSION['email'])){
                ?>
                
                <li><div style="display: flex;"><a href="../action/admin_logout.php">Logout </a><p style="font-size: small; color: gray; text-decoration: underline;">(<?php echo $_SESSION['email']; ?>)</p></div></li>
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
    <h1>Manage Events</h1>
    <section>
        <br />
        <br />
        <h2>Add New Event</h2>
        <br/>
        <form action="../action/manage_events_action.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="create">
            <label for="eventName">Event Name:</label>
            <input type="text" id="eventName" name="eventName" required>
            <label for="eventDate">Event Date:</label>
            <input type="date" id="eventDate" name="eventDate" required>
            <label for="venue">Venue:</label>
            <input type="text" id="venue" name="venue" required>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" required>
            <button type="submit" name="subtn">Add Event</button>
        </form>
    </section>
    
    <section>
    <br />
    <br />
        
        <section>
    <h2>Existing Events</h2>
   <br/>
    <table>
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($res as $re){
            ?>
                <tr>
                    <td><?php  echo $re[1]; ?></td>
                    <td><?php  echo substr($re[3], 0, 4); ?></td>
                    <td><?php  echo $re[4]; ?></td>
                    <td>
                        <a href="edit_event_view.php?EventID=<?php echo $re[0] ?>">Edit</a>
                        | 
                        <a href="../action/delete_event.php?EventID=<?php echo $re[0] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>
    </section>
</main>
<footer>
<p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
</footer>
</body>
</html>