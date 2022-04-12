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
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$phone = $mysqli->escape_string($_POST['phone']);
$address = $mysqli->escape_string($_POST['address']);
// eazy crypto
$password = $mysqli->escape_string(password_hash($_POST['psw'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string(md5(rand(0,1000)));
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
if ( $result->num_rows > 0 ) {
  $_SESSION['message'] = 'User with this email already exists!';
  header("location: error.php");
}
else { // Email doesn't already exist in a database, proceed...
  $sql_user = "INSERT INTO users (email, password, hash) "
          . "VALUES ('$email','$password', '$hash')";
  $sql_info = "INSERT INTO info (firstname, lastname, phone, address) "
          . "VALUES ('$first_name', '$last_name', '$phone', '$address')";
  // Add user and info about user to the database
  if( $_POST['psw'] == $_POST['repsw'] ) {
    if ( $mysqli->query($sql_user) && $mysqli->query($sql_info) ) {
      $_SESSION['logged_in'] = true; // So we know the user has logged in
      header("location: profile.php");
    }
    else {
      $_SESSION['message'] = 'Registration failed!';
      header("location: error.php");
    }
  } else {
    $_SESSION['message'] = 'Registration failed!<br>Passwords do not match!';
    header("location: error.php");
  }
}
