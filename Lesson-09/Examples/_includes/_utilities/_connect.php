<?php
    
  if (file_exists(dirname(__FILE__) .'/.env.php')) include('_utilities/.env.php');

  function connect () {
    $host = getenv('DB_HOST');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');
    $db = getenv('DB');
    
    // Create the connection
    $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);

    return $conn;
  }