<?php
// connect to the database
$db_host = 'localhost';
$db_user = 'username';
$db_pass = 'password';
$db_name = 'pictures';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// check if the connection was successful
if (!$conn) {
  die('Database connection error: ' . mysqli_connect_error());
}

// check if the form was submitted
if (isset($_POST['submit'])) {
  // save the uploaded file
  $filename = uniqid() . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
  move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $filename);

  // insert the filename into the database
  $sql = "INSERT INTO pictures (filename) VALUES ('$filename')";
  mysqli_query($conn, $sql);
}

// close the database connection
mysqli_close($conn);
?>

<form method="post" enctype="multipart/form-data">
  <input type="file" name="file">
  <input type="submit" name="submit" value="Upload">
</form>
