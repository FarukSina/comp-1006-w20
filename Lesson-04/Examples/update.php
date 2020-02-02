<?php

  // Our database connection
  $conn = mysqli_connect('localhost', 'root', null, 'lesson_03');

  var_dump($_POST);

  // Updating our new row into the countries table
  $res = mysqli_query($conn, "UPDATE countries SET
    name = '{$_POST['name']}',
    description = '{$_POST['description']}',
    population = {$_POST['population']}
  WHERE id = {$_POST['id']}");

  if ($res) {
    // We were successful
    echo "The country was updated successfully.";
  } else {
    // We failed
    echo "There was an error updating the record: " . mysqli_error($conn);
  }

?>