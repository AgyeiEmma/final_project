<?php
require_once '../setting/connection.php';

$action = $_POST['action'] ?? '';

if ($action == 'create') {
    // Logic to add a new user
    // Sanitize and validate input values
    $name = filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $role = $_POST['role'];
    $password = $_POST['password']; // Consider using password hashing

    // Insert query to add user to database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (Name, Email, Phone, Role, Password) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $role, $hashedPassword]);

    // Redirect or show a success message
}
// Handle 'update' and 'delete' actions similarly


$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action == 'create') {
    // Creation logic...
    header("Location: ../view/manage_users_view.php");
}
elseif ($action == 'delete') {
    $UserID = $_GET['UserID'];
    $stmt = $pdo->prepare("DELETE FROM users WHERE UserID = ?");
    $stmt->execute([$UserID]);

    header("Location: ../view/manage_users_view.php");
}
elseif ($action == 'update') {
    // Assume all required fields are passed and sanitized
    $UserID = $_POST['UserID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    // Password update could be handled separately

    $stmt = $pdo->prepare("UPDATE users SET Name = ?, Email = ?, Phone = ?, Role = ? WHERE UserID = ?");
    $stmt->execute([$name, $email, $phone, $role, $UserID]);

    header("Location: ../view/manage_users_view.php");
}
?>