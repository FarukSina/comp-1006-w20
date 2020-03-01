<!-- Step 1: (2 points) Include your header here -->
  <?php require_once('./_config.php'); ?>
  <?php include_once('_partials/_header.php'); ?>
<!-- Step 2: (1 points) Create a link back to home.php -->
<!-- CREATE YOUR LINK BELOW THIS LINE -->
  <a href="index.php">Home</a>
    
<!-- Step 3: (15 points) Create a form that has a field for the following columns -->
<!-- first_name, last_name, date_of_birth,  alias, active -->
<!-- Ensure you don't forget the name attribute for each field -->

<!-- Step 4: (4 points) Add the action and method attributes -->
<!-- Ensure you use the correct HTTP method and point the action at the correct processing page -->
<!-- CREATE YOUR FORM BELOW THIS LINE -->
  <form action="./insert.php" method="post">
    <div>
      <label>First Name:</label><br>
      <input type="text" name="first_name">
    </div>

    <div>
      <label>Last Name:</label><br>
      <input type="text" name="last_name">
    </div>

    <div>
      <label>DOB:</label><br>
      <input type="text" name="date_of_birth" placeholder="YYYY-MM-DD">
    </div>

    <div>
      <label>Alias:</label><br>
      <input type="text" name="alias">
    </div>
        
    <div>
      <label>Active:</label><br>
      <input type="number" name="active" placeholder="1/0"> 
    </div>

    <div>
      <label>Hero:</label><br>
      <input type="number" name="hero">
    </div>
    <button type="submit" name="submit-create">Create Super</button>
  </form>

<!-- Step 5: (2 points) Include your footer here -->
  <?php include_once('_partials/_footer.php'); ?>


<!-- TOTAL POINTS POSSIBLE: 24 -->