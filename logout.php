<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Logout</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
  <header>goodbye!</header>
  <main>
    <?= '<span class="successfully">You have been logged out!</span>'; ?>
    <a href="index.php" class="button-link">go main page</a>
  </main>
  <footer>&lt;/&gt; 20!7</footer>
  <script src="js/index.js" async></script>
</body>
</html>
