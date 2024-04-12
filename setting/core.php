<?php
session_start(); // Start the session at the very beginning

function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        // User is not logged in, redirect to login page
        header('Location: ../view/home_view.php');
        die(); // Stop script execution
    }
}

// Now, you can call this function at the start of any page where you require the user to be logged in
checkLogin();

// If the script continues past this point, it means the user is logged in
echo "You are logged in and can view this page.";
?>