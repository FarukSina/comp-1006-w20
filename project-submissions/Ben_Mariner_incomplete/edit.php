<?php
  // Step 1: (2 points) Include your connection
  // CREATE YOUR CONNECTION BELOW THIS LINE
  $conn = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB'));
  // Step 2: (8 points) Retrieve the 'supers' row from your database
  // Ensure you use the condition to get only the one specific row
  // CREATE YOUR QUERY LOGIC BELOW THIS LINE
    $result = mysqli_query($conn, "SELECT * FROM project01 WHERE id = {$_GET['supers']}");
    $row = mysqli_fetch_assoc($result);
    var_dump($row);
?>

<!-- Step 3: (2 points) Include your header here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Favourite Movies</title>
</head>
<!-- Step 4: (1 points) Create a link back to home.php -->
<!-- CREATE YOUR LINK BELOW THIS LINE -->
<ul class="main-nav">
  <li>
    <a href="<?php echo BASE_PATH ?>">Home</a>
  </li>
  <li>
</ul>
<!-- Step 5: (15 points) Create a form that has a field for the following columns -->
<!-- first_name, last_name, date_of_birth,  alias, active -->
<!-- Ensure you don't forget the name attribute for each field -->
<form action="./update.php" method="post">
<div>
    <label>First Name:</label>
<input name="first" value="<?php echo $row['first']?>">
</div>
<div>
    <label>Last Name:</label>
<input name="last" value="<?php echo $row['last']?>">
</div>
<div>
    <label>Date of Birth:</label>
<input name="birth" type="num" value="<?php echo $row['birth']?>">
</div>

<!-- Step 6: (4 points) Add the action and method attributes -->
<!-- Ensure you use the correct HTTP method and point the action at the correct processing page -->
    <form action="./insert.php" method="post">
<!-- Step 7: (10 points) Prepopulate the form with the values from the retrieved row -->
<!-- CREATE YOUR FORM BELOW THIS LINE -->
<body>
    <div>
        <label>Movie Name:</label>
    <input name="name">
    </div>
    <div>
        <label>Movie Genre:</label>
    <textarea name="genre"></textarea>
    </div>
    <div>
        <label>Movie Rating:</label>
    <input name="rating" type="num">
    </div>
        <button type="submit">Create</button>
    </form>
  </body>
</html>

<!-- Step 8: (2 points) Include your footer here -->
</body>
</html>
<footer>
    <p><small>&copy; Project-01 Favourite Movie, All Rights Reserved</small></p>
</footer>


<!-- TOTAL POINTS POSSIBLE: 44 -->