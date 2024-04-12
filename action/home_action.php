<?php
session_start();
include '../setting/connection.php'; // Ensure this path is correct

if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE Email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);

    if (!empty($res)) {
        if (password_verify($password, $res['Password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['UserID'] = $res['UserID'];
            echo "<script>alert('Login Successfully'); window.location.href = '../view/user_dashboard_view.php';</script>";
       
        } else {
            echo "<script>alert('Incorrect password'); window.location.href = '../view/home_view.php';</script>";
        }
    }else {
        echo "<script>alert('User doesnot exist');  window.location.href = '../view/home_view.php';</script>";
    }
    

}

?>