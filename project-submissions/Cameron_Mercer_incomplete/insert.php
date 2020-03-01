<?php
  if(!filter_has_var(INPUT_POST,'submit-create')){
    // Redirect to new.php
    header('Location: new.php');
    die;
  }else{
  // Step 1: (2 points) Include your connection
  // CREATE YOUR CONNECTION BELOW THIS LINE
    require_once('./_config.php');
    include_once('_partials/_header.php'); // connection funtion required in header
    include_once('_partials/_footer.php');
    $conn = connect();
  // Step 2: (17 points) Insert the new 'supers' row into the database
  // CREATE YOUR QUERY LOGIC BELOW THIS LINE

    $sql = "INSERT INTO supers (
      first_name,
      last_name,
      date_of_birth,
      alias,
      active,
      hero
    ) VALUES (
      :first_name,
      :last_name,
      :date_of_birth,
      :alias,
      :active,
      :hero
    )";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':first_name', $_POST['first_name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':date_of_birth', $_POST['date_of_birth']);
    $stmt->bindParam(':alias', $_POST['alias']);
    $stmt->bindParam(':active', $_POST['active']);
    $stmt->bindParam(':hero', $_POST['hero']);
    
    $stmt->execute();

    // ':last_name' => $_POST['last_name']},
    // ':date_of_birth' => $_POST['date_of_birth']},
    // ':alias' => $_POST['alias'],
    // ':active' => $_POST['active'],
    // ':hero' => $_POST['hero']

  // Step 3: (16 points) Perform basic error handling and redirect the user with a success or error message
  // Ensure you store the messages into the $_SESSION
  // Ensure you exit after your redirect
  // CREATE YOUR ERROR HANDLING BELOW THIS LINE
    
    session_start();

    if($stmt){
      $_SESSION['session_notify'] = "Hero Was Created Successfully";
    }else{
      $_SESSION['session_notify'] = "Hero Creation Encountered an Error";
    }

    // Redirect to notification.php
    header('Location: notification.php');
    die; // Stops Page
    }

  // TOTAL POINTS POSSIBLE: 35
?>