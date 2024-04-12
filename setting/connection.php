<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "booking_system_new");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->query("SET GLOBAL general_log = 'ON'");
$conn->query("SET GLOBAL log_output = 'TABLE'");
?>
 