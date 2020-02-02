<?php

  // Our database connection
  $conn = mysqli_connect('localhost', 'root', null, 'lesson_03');

  var_dump($_GET);

  // Updating our new row into the countries table
  $res = mysqli_query($conn, "DELETE FROM countries WHERE id = {$_GET['id']}");

  if ($res) {
    // We were successful
    echo "The country was delete successfully.";
  } else {
    // We failed
    echo "There was an error deleting the record: " . mysqli_error($conn);
  }

?>