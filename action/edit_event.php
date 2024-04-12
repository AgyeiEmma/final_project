<?php

require_once '../setting/connection.php';

if(isset($_POST['editbtn'])){
    $eventname = $_POST['eventName'];
    $eventdate = $_POST['eventDate'];
    $eventvenue = $_POST['venue'];
    $eventid = $_POST['EventID'];
   
    $sql = "UPDATE Events SET EventName='$eventname', EventDate='$eventdate', Venue='$eventvenue' WHERE EventID='$eventid'";
    $result = mysqli_query($conn, $sql);

    if($result === true){
        echo "<script>alert('Event Updated Successfully'); window.location.href = '../view/manage_events_view.php';</script>";
       
    }else{
        echo "<script>alert('Sorry event not updated. Try again'); window.location.href = ../view/manage_events_view.php</script>";
    }

}



?>