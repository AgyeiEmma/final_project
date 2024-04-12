<?php
// Assuming you have a database connection setup
include '../setting/connection.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

// var_dump($data->name);
// exit;

if ($data) {
   
    // Insert into database (ensure you handle errors and check for existing users)
    $sql = "INSERT INTO users (Name, Email, Phone, Password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $password);

     // Sanitize input
     $name = htmlspecialchars($data->name);
     $email = filter_var($data->email, FILTER_SANITIZE_EMAIL);
     $phone = htmlspecialchars($data->phone);
     $password = password_hash($data->password, PASSWORD_DEFAULT);

    //  var_dump($name, $email, $phone, $password);
    //  exit;

    $res;
    
    if ($stmt->execute()) {
        $res['status'] = 'success';
        $res['message'] = 'User registered successfully';
        
    } else {
        $res['status'] = 'failed';
        $res['message'] = 'User not registered failed';
        //echo json_encode(array('status' => 'failed', 'message' => 'User not registered failed'));
    }


    echo json_encode($res);
    $stmt->close();
    $conn->close();
}
?>