<?php
session_start();
if (!isset($_SESSION['username'])) {
  die('Access denied');
}

// connect to the database
$db_host = 'localhost';
$db_user = 'username';
$db_pass = 'password';
$db_name = 'chat';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// check if the connection was successful
if (!$conn) {
  die('Database connection error: ' . mysqli_connect_error());
}

// sanitize the input data
$message = mysqli_real_escape_string($conn, $_POST['message']);

// insert the message into the database
$sql = "INSERT INTO messages (username, message) VALUES ('{$_SESSION['username']}', '$message')";
mysqli_query($conn, $sql);

// close the database connection
mysqli_close($conn);
?>
