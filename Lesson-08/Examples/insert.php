<?php

  /* VALIDATION */
  // Create an array to hold all the field errors
  $errors = [];

  // Validate the necessary fields are not empty
  $required_fields = [
    'first_name',
    'last_name',
    'email',
    'email_confirmation',
    'password',
    'password_confirmation'
  ];
  
  foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
      $human_field = str_replace("_", " ", $field);
      $errors[] = "You cannot leave the {$human_field} blank.";
    }
  }

  // Validate the email is in the correct format
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "The email isn't in a valid format. Please correct it.";
  }

  // Validate the email matches the email_confirmation
  if ($_POST['email'] !== $_POST['email_confirmation']) {
    $errors[] = "The email doesn't match the email confirmation field";
  }

  // Validate the password matches the password_confirmation
  if ($_POST['password'] !== $_POST['password_confirmation']) {
    $errors[] = "The password doesn't match the password confirmation field";
  }
  
  // Check if there errors
  if (count($errors)  > 0) {
    // Add the current form values to the $_SESSION
    session_start();
    $_SESSION['form_values'] = $_POST;
    
    // Store the errors
    $_SESSION['errors'] = $errors;
    
    // Redirect back to the form and exit
    header('Location: ./register.php');
    exit;
  }
  /* END OF VALIDATION */

  /* NORMALIZATION */
  // Normalize the string fields (convert to lowercase and capitalize the first letter)
  foreach (['first_name', 'last_name'] as $field) {
    $_POST[$field] = strtolower($_POST[$field]);
    $_POST[$field] = ucwords($_POST[$field]);
  }

  // Lowercase the email
  $_POST['email'] = strtolower($_POST['email']);

  // Hash the password
  $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
  /* END NORMALIZATION */

  /* SANITIZATION */
  // Sanitize all values on their insertion
  require_once('_connect.php');
  $conn = connect();
  $sql = "
    INSERT INTO users (
      first_name,
      last_name,
      email,
      password
    ) VALUES (
      :first_name,
      :last_name,
      :email,
      :password
    )
  ";
  $stmt = $conn->prepare($sql);

  // Sanitize using the binding
  $stmt->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR); // Casts it to a string
  $stmt->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR); // Casts it to a string
  $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
  $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
  /* END SANITIZATION */

  // Insert our row
  $stmt->execute();

  // Check for errors
  session_start();
  if ($stmt->errorCode() === "23000") {
    $_SESSION['errors'][] = "You have already registered. Please login.";
    $_SESSION['form_values'] = $_POST;
  } else if ($stmt->errorCode() !== "00000") {
    // Add the error message to the errors session array
    $_SESSION['errors'][] = "There was an error during registration.";
    $_SESSION['form_values'] = $_POST;
  } else {
    // Add the success message to the successes session array
    $_SESSION['successes'][] = "You have been registered successfully.";
    header('Location: ./login.php');
    exit;
  }

  // Redirect back to the form
  header('Location: ./register.php');
  exit;