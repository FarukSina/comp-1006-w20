<?php
  // Step 1: (2 points) Include your connection
  // CREATE YOUR CONNECTION BELOW THIS LINE
    require_once('./_config.php');
    include_once('_partials/_header.php');
    include_once('_partials/_footer.php');
    $conn = connect();
  // Step 2: (20 points) Update the existing 'supers' row in the database
  // CREATE YOUR QUERY LOGIC BELOW THIS LINE

  $sql = "UPDATE supers
    SET
      first_name = :first_name,
      last_name = :last_name,
      date_of_birth = :date_of_birth,
      alias = :alias,
      active = :active,
      hero = :hero
    WHERE id = :id";

  $stmt = $conn->prepare($sql);

  $stmt->bindParam(':first_name', $_POST['first_name']);
  $stmt->bindParam(':last_name', $_POST['last_name']);
  $stmt->bindParam(':date_of_birth', $_POST['date_of_birth']);
  $stmt->bindParam(':alias', $_POST['alias']);
  $stmt->bindParam(':active', $_POST['active']);
  $stmt->bindParam(':hero', $_POST['hero']);
  $stmt->bindParam(':id', $_POST['id']);

  $stmt->execute();

  var_dump($_GET);
  var_dump($_POST);


  // Step 3: (16 points) Perform basic error handling and redirect the user with a success or error message
  // Ensure you store the messages into the $_SESSION
  // Ensure you exit after your redirect
  // CREATE YOUR ERROR HANDLING BELOW THIS LINE

    session_start();

    if($stmt){
      $_SESSION['session_notify'] = "Hero Was Updated Successfully";
    }else{
      $_SESSION['session_notify'] = "Hero Update Encountered an Error";
    }

    // Redirect to notification.php
    header('Location: notification.php');
    die; // Stops Page

  // TOTAL POINTS POSSIBLE: 38
?>