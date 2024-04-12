<?php
require_once '../setting/connection.php';

//Delete event
if(isset($_GET['EventID'])){
    $eventid = $_GET['EventID'];

   $sql = "DELETE FROM Events WHERE EventID='$eventid'";
   $result = mysqli_query($conn, $sql);

   if($result === true){
        echo "<script>alert('Event Deleted Successfully'); window.location.href = '../view/manage_events_view.php';</script>";
       
   }else{
        echo "<script>alert('Sorry event not deleted. Try again'); window.location.href = ../view/manage_events_view.php</script>";
   }
}


?>