<?php

  // Our database connection
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $host = $url["host"] ?? 'localhost';
  $user = $url["user"] ?? 'root';
  $pass = $url["pass"] ?? null;
  $db = substr($url["path"], 1) ?? 'lesson_03';

  // Our database connection
  $conn = mysqli_connect($host, $user, $pass, $db);

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