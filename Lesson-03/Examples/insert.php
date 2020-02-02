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

  if ($res) {
    // We were successful
    echo "The new country was created successfully.";
  } else {
    // We failed
    echo "There was an error creating the record: " . mysqli_error($conn);
  }

?>