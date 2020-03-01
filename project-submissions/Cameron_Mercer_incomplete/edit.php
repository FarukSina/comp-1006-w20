<?php
  // Step 1: (2 points) Include your connection
  // CREATE YOUR CONNECTION BELOW THIS LINE
  require_once('./_config.php');
  include_once('_partials/_header.php'); // connection funtion required in header
  $conn = connect();
  // Step 2: (8 points) Retrieve the 'supers' row from your database
  // Ensure you use the condition to get only the one specific row
  // CREATE YOUR QUERY LOGIC BELOW THIS LINE
  $sql = "SELECT * FROM supers
      WHERE
      id = :id";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();

    $row = $stmt->fetch();

    var_dump($_GET);
  var_dump($row);
?>

<!-- Step 3: (2 points) Include your header here -->
<!-- Done - See Line 4 -->

<!-- Step 4: (1 points) Create a link back to home.php -->
<!-- CREATE YOUR LINK BELOW THIS LINE -->
  <a href="index.php">Home</a>
<!-- Step 5: (15 points) Create a form that has a field for the following columns -->
<!-- first_name, last_name, date_of_birth,  alias, active -->
<!-- Ensure you don't forget the name attribute for each field -->

<!-- Step 6: (4 points) Add the action and method attributes -->
<!-- Ensure you use the correct HTTP method and point the action at the correct processing page -->

<!-- Step 7: (10 points) Prepopulate the form with the values from the retrieved row -->
<!-- CREATE YOUR FORM BELOW THIS LINE -->
  <form action="./update.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <div>
      <label>First Name:</label><br>
      <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>">
    </div>

    <div>
      <label>Last Name:</label><br>
      <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>">
    </div>

    <div>
      <label>DOB:</label><br>
      <input type="text" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>">
    </div>

    <div>
      <label>Alias:</label><br>
      <input type="text" name="alias" value="<?php echo $row['alias']; ?>">
    </div>
      
    <div>
      <label>Active:</label><br>
      <input type="text" name="active" value="<?php echo $row['active']; ?>">
    </div>

    <div>
      <label>Hero:</label><br>
      <input type="text" name="hero" value="<?php echo $row['hero']; ?>">
    </div>
    <button type="submit" name="submit-edit">Edit Super</button>
  </form>


<!-- Step 8: (2 points) Include your footer here -->
  <?php require_once('_partials/_footer.php'); ?>


<!-- TOTAL POINTS POSSIBLE: 44 -->