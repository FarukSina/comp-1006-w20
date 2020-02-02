<?php

  // Our database connection
  $conn = mysqli_connect('localhost', 'root', null, 'lesson_03');

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