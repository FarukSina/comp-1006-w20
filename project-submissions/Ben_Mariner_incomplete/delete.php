<?php
  // Step 1: (2 points) Include your connection
  // CREATE YOUR CONNECTION BELOW THIS LINE
  $conn = mysqli_connect('localhost:8889', 'root', 'root', 'project_01');
  // Step 2: (20 points) Delete the existing 'supers' row from the database
  // CREATE YOUR QUERY LOGIC BELOW THIS LINE
  $sql = "DELETE FROM project01 WHERE id = {$_GET['supers']}";
  $res = mysqli_query($conn, $sql);
  // Step 3: (16 points) Perform basic error handling and redirect the user with a success or error message
  // Ensure you store the messages into the $_SESSION
  // Ensure you exit after your redirect
  // CREATE YOUR ERROR HANDLING BELOW THIS LINE
  if ($res){
    echo "The movie was deleted successfully";
}else{
    echo "There was an error deleting the movie:" .mysqli_error($conn);
}
  // TOTAL POINTS POSSIBLE: 38
?>