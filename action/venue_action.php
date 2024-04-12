<?php
require_once '../setting/connection.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action == 'create') {
    // Assuming all required fields are present and sanitized
    $venueName = $_POST['venueName'];
    $layout = $_POST['layout'];

    $stmt = $pdo->prepare("INSERT INTO Venues (VenueName, Layout) VALUES (?, ?)");
    if ($stmt->execute([$venueName, $layout])) {
        $message = "Venue added successfully.";
    } else {
        $message = "Error adding venue.";
    }
} elseif ($action == 'update') {
    // Assuming all required fields are present and sanitized
    $venueID = $_POST['venueID'];
    $venueName = $_POST['venueName'];
    $layout = $_POST['layout'];

    $stmt = $pdo->prepare("UPDATE Venues SET VenueName = ?, Layout = ? WHERE VenueID = ?");
    if ($stmt->execute([$venueName, $layout, $venueID])) {
        $message = "Venue updated successfully.";
    } else {
        $message = "Error updating venue.";
    }
} elseif ($action == 'delete') {
    $venueID = $_GET['venueID'];

    $stmt = $pdo->prepare("DELETE FROM Venues WHERE VenueID = ?");
    if ($stmt->execute([$venueID])) {
        $message = "Venue deleted successfully.";
    } else {
        $message = "Error deleting venue.";
    }
}

// Redirect back to the venue management page with a success or error message
header("Location: ../view/manage_venues_view.php?message=" . urlencode($message));
exit();