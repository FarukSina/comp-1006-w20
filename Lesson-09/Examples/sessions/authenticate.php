<?php

  require_once('../_config.php');

  // Connect to the database
  require('_utilities/_connect.php');
  $conn = connect();
  
  // Create our SQL with an email placeholder
  $sql = "SELECT * FROM users WHERE email = :email";
  
  // Prepare the SQL
  $stmt = $conn->prepare($sql);
  
  // Bind the value to the placeholder (incidently this will also sanitize the value)
  $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
  
  // Execute
  $stmt->execute();
  
  // Check for errors
  session_start();
  if ($stmt->errorCode() !== "00000") {
    // Add the error message to the errors session array
    $_SESSION['errors'][] = "You could not be authenticated. Check your email address or please register for an account.";
    $_SESSION['form_values'] = $_POST;

    // Redirect back to the form
    header('Location: ' . BASE_PATH . '/sessions/login.php');
    exit;
  }

  // Check if we have a user and their password is correct
  $user = $stmt->fetch();

  if (!$user || !password_verify($_POST['password'], $user['password'])) {
    // Add the error message to the errors session array
    $_SESSION['errors'][] = "You could not be authenticated. Check your email address or please register for an account.";
    $_SESSION['form_values'] = $_POST;

    // Redirect back to the form
    header('Location: ' . BASE_PATH . '/sessions/login.php');
    exit;
  }

  // Add a session variable to keep track of the user
  unset($user['password']);
  $_SESSION['user'] = $user;

  // Redirect back to the form
  $_SESSION['successes'][] = "You have successfully logged in.";
  header('Location: ' . BASE_PATH . '/users/profile.php');
  exit;