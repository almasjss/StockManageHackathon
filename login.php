<?php
/* User login process, checks if user exists and password is correct */
// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();
    if ( password_verify($_POST['psw'], $user['password']) ) {
      $id = $user['id'];
      $result_info = $mysqli->query("SELECT * FROM info WHERE id='$id'"); // get info about user by user id
      $info = $result_info->fetch_assoc();
      $_SESSION['email'] = $user['email'];
      $_SESSION['firstname'] = $info['firstname'];
      $_SESSION['lastname'] = $info['lastname'];
      $_SESSION['phone'] = $info['phone'];
      $_SESSION['address'] = $info['address'];
      // This is how we'll know the user is logged in
      $_SESSION['logged_in'] = true;
      header("location: profile.php");
    }
    else {
      $_SESSION['message'] = "You have entered wrong password, try again!";
      header("location: error.php");
    }
}
