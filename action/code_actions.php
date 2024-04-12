<?php
require_once '../setting/connection.php';

if ($_POST['action'] == 'generate' && isset($_POST['eventID'], $_POST['numCodes'])) {
    $eventID = $_POST['eventID'];
    $numCodes = $_POST['numCodes'];

    for ($i = 0; $i < $numCodes; $i++) {
        $pin = generatePin(); // Function to generate a unique pin
        // Insert pin into database
        $stmt = $pdo->prepare("INSERT INTO Pins (Pin, EventID) VALUES (?, ?)");
        $success = $stmt->execute([$pin, $eventID]);

        if (!$success) {
            // Handle failure to insert pin
            echo "Failed to generate pin: $pin";
            // Optionally, break or continue depending on your error handling preference
        }
    }

    header("Location: ../view/generate_codes_view.php?success=true");
    exit();
}

// Function to generate a unique pin
function generatePin() {
    // Generate a random pin. Adjust the generation logic as needed for your requirements
    return rand(1000, 9999); // Example: Generates a 4-digit pin
}