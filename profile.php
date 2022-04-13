<?php
/* Displays user information */
require 'db.php';
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['firstname'];
    $last_name = $_SESSION['lastname'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome<?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
  if (isset($_POST['updateinfo'])) // user update info
    require 'update.php';
?>
<body>
  <header>welcome<br><?= $first_name.' '.$last_name ?></header>
  <main>
    <?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) )
      echo '<span class="successfully" id="suc-update">' . $_SESSION['message'] . '</span>';
    ?>
    <form action="profile.php" method="post" id="profile-form" class="form">
      <input type="text" name="firstname" required placeholder="firstname" value="<?= $first_name; ?>">
      <input type="text" name="lastname" required placeholder="lastname" value="<?= $last_name; ?>">
      <input type="text" name="phone" required placeholder="+357(__)_______" value="<?= $phone; ?>">
      <input type="text" name="address" required placeholder="Address" value="<?= $address; ?>">
      <input type="text" name="email" value="<?= $email?>" class="hidden" hidden>
      <input type="submit" class="button" name="updateinfo" value="save">
    </form>
    <a href="logout.php" class="button-link">log out without save</a>
    <a href="stock.php" class="button-link">Stock Manage</a>
  </main>
  <script src="js/index.js"></script>
</body>
</html>
