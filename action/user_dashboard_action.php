<?php
session_start();
include '../setting/connection.php'; // Ensure this path is correct

// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to login page if not
    header("Location: ../view/home_view.php");
    exit();
}

$user_id = $_SESSION['UserID'];







$sql="SELECT Name, Email, Phone FROM Users WHERE UserID = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>