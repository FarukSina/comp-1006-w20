<?php
  // Step 1: (2 points) Include your connection
  // CREATE YOUR CONNECTION BELOW THIS LINE
    require_once('./_config.php');
    include_once('_partials/_header.php'); // connection funtion required in header
    include_once('_partials/_footer.php');
    $conn = connect();
  // Step 2: (20 points) Delete the existing 'supers' row from the database
  // CREATE YOUR QUERY LOGIC BELOW THIS LINE
    $sql = "DELETE FROM supers
      WHERE
      id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
  // Step 3: (16 points) Perform basic error handling and redirect the user with a success or error message
  // Ensure you store the messages into the $_SESSION
  // Ensure you exit after your redirect
  // CREATE YOUR ERROR HANDLING BELOW THIS LINE
  session_start();

  if($stmt){
    $_SESSION['session_notify'] = "Hero Was Deleted Successfully";
  }else{
    $_SESSION['session_notify'] = "Hero Deletion Encountered an Error"; //Add Error
  }

  // Redirect to notification.php
  header('Location: notification.php');
  die; // Stops Page    

  
  // TOTAL POINTS POSSIBLE: 38
?>