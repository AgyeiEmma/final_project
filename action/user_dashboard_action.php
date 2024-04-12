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

// Fetch user information
$userQuery = $conn->prepare("SELECT Name, Email, Phone FROM Users WHERE UserID = ?");
$userQuery->bind_param("i", $user_id);
$userQuery->execute();
$result = $userQuery->get_result();
$user = $result->fetch_assoc();

$userQuery->close();
// $bookingQuery->close();
$pinQuery->close();
?>