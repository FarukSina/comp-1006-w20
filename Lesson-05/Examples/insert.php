<?php

  // Our database connection
  include('./.env.php');
  $conn = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB'));

  var_dump($_POST);

  // Inserting our new row into the countries table
  $res = mysqli_query($conn, "INSERT INTO countries (
    name,
    description,
    population
  ) VALUES (
    '{$_POST['name']}',
    '{$_POST['description']}',
    {$_POST['population']}
  )");

  // Initialize/resume the session
  session_start();

  if ($res) {
    // We were successful
    $_SESSION['notification'] = "The new country was created successfully.";
  } else {
    // We failed
    $_SESSION['notification'] = "There was an error creating the record: " . mysqli_error($conn);
  }

  header("Location: ./notification.php");
  exit;

?>