<?php
  require 'db.php';
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign-Up/Login</title>
  <?php include 'css/css.html'; ?>
</head>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) { //user logging in
      require 'login.php';
    }
    elseif (isset($_POST['signin'])) { //user signing in
      require 'signin.php';
    }
  }
?>
<body>
  <header>Stock Manager Almas, Dias</header>
  <main>
    <div class="controls tabs">
      <div id="login-btn" class="tab-link active">Log In</div>
      <div id="signin-btn" class="tab-link">Sign In</div>
    </div>
    <form action="index.php" method="post" id="login-form" class="form">
      <input type="email" name="email" required placeholder="email@mail.com">
      <input type="password" name="psw" required placeholder="password">
      <input type="submit" class="button" name="login" value="log in">
    </form>
    <form action="index.php" method="post" id="signin-form" class="form hidden">
      <input type="text" name="firstname" required placeholder="firstname">
      <input type="text" name="lastname" required placeholder="lastname">
      <input type="email" name="email" required placeholder="email@mail.com">
      <input type="password" name="psw" required placeholder="password">
      <input type="password" name="repsw" required placeholder="repeat password">
      <input type="text" name="phone" required placeholder="+357(__)_______">
      <input type="text" name="address" required placeholder="Address">
      <input type="submit" class="button" name="signin" value="sign in">
    </form>
  </main>
  <script src="js/index.js" async></script>
</body>
</html>
