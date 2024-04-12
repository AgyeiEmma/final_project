<?php
require_once '../setting/connection.php';

$UserID = $_GET['UserID'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM Users WHERE UserID = ?");
$stmt->execute([$UserID]);
$user = $stmt->fetch();

if (!$user) {
    echo "User not found";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <!-- Include CSS -->
</head>
<body>
    <h1>Edit User</h1>
    <form action="user_actions.php" method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="UserID" value="<?= $user['UserID'] ?>">

        <!-- Repeat the form structure from manage_users_view.php, but with values filled in -->
        <!-- Example for the name field -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required value="<?= htmlspecialchars($user['Name']) ?>">

        <!-- Include other fields: Email, Phone, Role, and a Save button -->

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>