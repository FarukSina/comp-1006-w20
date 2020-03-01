<?php

  // Step 1: (1 point) Start your session
  // CREATE YOUR SESSION START BELOW THIS LINE

  session_start();

  // Step 2: (4) Redirect the user if they don't have a notification
  // CREATE YOUR REDIRECT LOGIC BELOW THIS LINE

    if(empty($_SESSION['session_notify'])){
      header('Location: index.php');
      exit;
    }else{

  // Step 3: (5) Output the notification and clear it from the session (once it's outputted)
  // CREATE YOUR NOTIFICATION OUTPUT AND CLEAR BELOW THIS LINE

    echo $_SESSION['session_notify'];
    unset($_SESSION['session_notify']);
    
    }
  
  // TOTAL POINTS POSSIBLE: 10

?>