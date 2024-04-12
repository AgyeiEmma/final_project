<?php
session_start();
include '../setting/connection.php'; // Ensure this path is correct

if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Admin WHERE Email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);
   
    if (!empty($res)) {
        if ($password == $res['Password']) {
            $_SESSION['name'] = $res['Name'];
            $_SESSION['email'] = $email;
            $_SESSION['UserRole'] = $res['UserRole'];
            echo "<script>alert('Login Successfully'); window.location.href = '../view/dashboard_view.php';</script>";
       
        } else {
            echo "<script>alert('Incorrect password'); window.location.href = '../view/admin_login.php';</script>";
        }
    }else {
        echo "<script>alert('User doesnot exist');  window.location.href = '../view/admin_login.php';</script>";
    }
    

}

?>