<?php
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

// retrieve the messages from the database
$sql = "SELECT * FROM messages ORDER BY id DESC LIMIT 50";
$result = mysqli_query($conn, $sql);

// display the messages
while ($row = mysqli_fetch_assoc($result)) {
  echo '<div><strong>' . $row['username'] . ':</strong> ' .
