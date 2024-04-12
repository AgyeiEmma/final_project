<?php
require_once '../setting/connection.php';

//Adding an bookings
if (isset($_POST['bookbtn'])) {
    $eventid = $_POST['EventID'];
    $price = $_POST['price'];
    $seat = $_POST['seat'];
    $userid = $_POST['userid'];
    $date = date("Y-m-d");

    $sql = "INSERT INTO bookings (EventID, Seat, Price, BookingDate, UserID) VALUES ('$eventid', '$seat', '$price', '$date','$userid')";
    $result = mysqli_query($conn, $sql);

    if ($result){
        $randomNumbers = array();
        for ($i = 0; $i < 4; $i++) {
            $randomNumbers[] = rand(1, 1000);
        }

        // Convert the PHP array to a JavaScript array
        $jsArray = json_encode($randomNumbers);


        echo "<script>alert('Hurray!. You have successfully booked an event. Your code is BKN" . implode($randomNumbers) . ". Keep it safe. You will need it on the day of the event.'); window.location.href = '../view/user_dashboard_view.php';</script>";
       
    }
    else{
        echo "<script>alert('Sorry event could not be booked. Try again'); window.location.href = ../view/book_page.php</script>";
    }
    

}

//Fetching actions
$sql = "SELECT bookings.BookingID,  events.EventName, events.Venue, users.Name, bookings.Price FROM bookings
        JOIN users ON bookings.UserID = users.UserID
        JOIN events ON bookings.EventId = events.EventID";

$result = mysqli_query($conn, $sql);
$resu = mysqli_fetch_all($result);

































// $action = $_GET['action'] ?? '';
// $BookingID = $_GET['BookingID'] ?? '';

// if ($action == 'cancel' && !empty($BookingID)) {
//     // Example cancellation logic
//     $stmt = $pdo->prepare("DELETE FROM Bookings WHERE BookingID = ?");
//     $stmt->execute([$BookingID]);

//     header("Location: ../view/manage_bookings_view.php");
//     exit();
// }
// elseif ($action == 'update') {
//     // Validate and sanitize inputs
//     $BookingID = $_POST['BookingID'];
//     $EventID = $_POST['eventID'];
//     $UserID = $_POST['userID'];

//     // Update the booking
//     $stmt = $pdo->prepare("UPDATE Bookings SET EventID = ?, UserID = ? WHERE BookingID = ?");
//     $stmt->execute([$EventID, $UserID, $BookingID]);

//     header("Location: ../view/manage_bookings_view.php");
//     exit();
// }
// function writeAuditLog($pdo, $userID, $actionType, $description) {
//     $stmt = $pdo->prepare("INSERT INTO AuditLogs (UserID, ActionType, Description) VALUES (?, ?, ?)");
//     $stmt->execute([$userID, $actionType, $description]);
// }

// // Example usage after a booking action
// if ($action == 'update' && $stmt->execute()) {
//     writeAuditLog($pdo, $userID, 'Update Booking', 'Booking ' . $BookingID . ' was updated.');
// }
?>