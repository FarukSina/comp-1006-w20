<?php

  session_start();

  // Redirect a user if there is no notification
  if (empty($_SESSION['notification'])) {
    header("Location: table.php");
    exit;
  }

  echo $_SESSION['notification'];

  // Clear the notification
  unset($_SESSION['notification']);

?>