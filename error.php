<?php
  require 'db.php';
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
  <header class="error">error</header>
  <main>
    <span class="error"><?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];
    else:
        header( "location: index.php" );
    endif;
    ?></span>
    <a href="index.php" class="button-link">go back</a>
  </main>
  <script src="js/index.js"></script>
  </body>
  </html>
