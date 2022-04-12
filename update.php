<?php
/*
  Registration process, inserts user info into the database
  and sends account confirmation email message
*/
// Set session variables to be used on profile.php page
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['address'] = $_POST['address'];
// Escape all $_POST variables to protect against SQL injections
$new_first_name = $mysqli->escape_string($_POST['firstname']);
$new_last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$new_phone = $mysqli->escape_string($_POST['phone']);
$new_address = $mysqli->escape_string($_POST['address']);

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
if ( $result->num_rows > 0 ) {
  // Email doesn't already exist in a database, proceed...
  // get user id
  $result_id = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
  $user = $result_id->fetch_assoc();
  $id = $user['id'];
  $sql_info = "UPDATE info SET firstname='$new_first_name', lastname='$new_last_name', phone='$new_phone', address='$new_address' WHERE id='$id'";
  // update about user info in to the database
  if ( $mysqli->query($sql_info) ) {
    $_SESSION['message'] = 'Update information was successful!';
    $_SESSION['logged_in'] = true; // So we know the user has logged in
    header("location: profile.php");
  } else {
    $_SESSION['message'] = 'Update information failed!';
    header("location: error.php");
  }
} else {
  $_SESSION['message'] = 'Update information failed!';
  header("location: error.php");
}
