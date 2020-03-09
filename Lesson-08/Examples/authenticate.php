<?php

  require('./_connect.php');

  session_start();

  // Validate the email
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors'][] = "Please ensure you email is in a valid format.";
    $_SESSION['form_values'] = $_POST;
    header('Location: ./login.php');
    exit;
  }

  // Normalize the email
  $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

  // Connect to the database
  $conn = connect();

  // Create our SQL with an email placeholder
  $sql = "SELECT * FROM users WHERE email = :email";

  // Prepare the SQL
  $stmt = $conn->prepare($sql);

  // Bind the value to the placeholder
  $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);

  // Execute
  $stmt->execute();

  // Check for errors
  if ($stmt->errorCode() !== "00000") {
    // Add the error message to the errors session array
    $_SESSION['errors'][] = "You could not be authenticated. Check your email address or please register for an account.";
    $_SESSION['form_values'] = $_POST;

    // Redirect back to the form
    header('Location: ./login.php');
    exit;
  }

  // Check if we have a user and their password is correct
  $user = $stmt->fetch();
  if (!$user || password_verify($_POST['password'], $user['password'])) {
    // Add the error message to the errors session array
    $_SESSION['errors'][] = "You could not be authenticated. Check your email address or please register for an account.";
    $_SESSION['form_values'] = $_POST;

    // Redirect back to the form
    header('Location: ./login.php');
    exit;
  }

  // Add a session variable to keep track of the user
  unset($user['password']);
  $_SESSION['user'] = $user;

  // Redirect back to the form
  $_SESSION['successes'][] = "You have successfully logged in.";
  header('Location: ./profile.php');
  exit;