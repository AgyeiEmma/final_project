<?php
require_once '../setting/connection.php';

//Adding an event
if (isset($_POST['subtn'])) {
    $eventname = $_POST['eventName'];
    $eventdate = $_POST['eventDate'];
    $eventvenue = $_POST['venue'];

    $fn = $_FILES["image"]["name"];
    $target_folder = "../images/events/";
    $up_dist = $target_folder . basename($fn);
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $up_dist);

    $image = $up_dist;

    $sql = "INSERT INTO events (EventName, Image, EventDate, Venue) VALUES ('$eventname', '$image','$eventdate', '$eventvenue')";
    $result = mysqli_query($conn, $sql);

    if ($result){
        echo "<script>alert('Event Added Successfully'); window.location.href = '../view/manage_events_view.php';</script>";
       
    }
    else{
        echo "<script>alert('Sorry event not added. Try again'); window.location.href = ../view/manage_events_view.php</script>";
    }
    

}


// Fetch all events
$sql = "SELECT * FROM events ";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_all($result);




// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if ($_POST['action'] == 'create') {
//         $eventName = $_POST['eventName'];
//         $eventDate = $_POST['eventDate'];
//         $venue = $_POST['venue'];

//         $sql = "INSERT INTO Events (EventName, EventDate, Venue) VALUES (?, ?, ?)";
//         $stmt = $pdo->prepare($sql);
//         $stmt->execute([$eventName, $eventDate, $venue]);

//         header("Location: manage_events_view.php");
//         exit();
//     }
//     // Include conditions and logic for 'update' and 'delete' actions


// $action = $_POST['action'] ?? $_GET['action'] ?? '';

// if ($action == 'create') {
//     // Create event logic...
// }
// elseif ($action == 'delete') {
//     $EventID = $_GET['EventID'];
//     $sql = "DELETE FROM Events WHERE EventID = ?";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$EventID]);

//     header("Location: manage_events_view.php");
//     exit();
// }
// elseif ($action == 'update') {
//     $EventID = $_POST['EventID'];
//     $eventName = $_POST['eventName'];
//     $eventDate = $_POST['eventDate'];
//     $venue = $_POST['venue'];

//     $sql = "UPDATE Events SET EventName = ?, EventDate = ?, Venue = ? WHERE EventID = ?";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$eventName, $eventDate, $venue, $EventID]);

//     header("Location: manage_events_view.php");
//     exit();
// }
    
// }
// ?>