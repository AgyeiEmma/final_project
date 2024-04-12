<?php
    session_start();
    session_destroy();
     
    header('Location: ../view/home_view.php');
     
?>
