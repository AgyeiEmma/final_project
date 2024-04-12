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

    $sql = "INSERT INTO Events (EventName, Image, EventDate, Venue) VALUES ('$eventname', '$image','$eventdate', '$eventvenue')";
    $result = mysqli_query($conn, $sql);

    if ($result){
        echo "<script>alert('Event Added Successfully'); window.location.href = '../view/manage_events_view.php';</script>";
       
    }
    else{
        echo "<script>alert('Sorry event not added. Try again'); window.location.href = ../view/manage_events_view.php</script>";
    }
    

}


// Fetch all events
$sql = "SELECT * FROM Events ";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_all($result);
?>