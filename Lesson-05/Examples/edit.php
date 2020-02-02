<?php

  // Our database connection
  include('./.env.php');
  $conn = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB'));

  // Fetch the single country by its provided ID
  $result = mysqli_query($conn, "SELECT * FROM countries WHERE id = {$_GET['id']}");
  $row = mysqli_fetch_assoc($result);
  var_dump($row);
?>

<!DOCTYPE html>
  <head>
    <title>Editing Countries</title>
  </head>

  <body>
    <!-- The form for creating a new country -->
    <form action="./update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <div>
        <label>Country Name:</label>
        <input name="name" value="<?php echo $row['name']; ?>">
      </div>

      <div>
        <label>Country Description:</label>
        <textarea name="description"><?php echo $row['description']; ?></textarea>
      </div>

      <div>
        <label>Country Population:</label>
        <input type="num" name="population" value="<?php echo $row['population']; ?>">
      </div>

      <button type="submit">Update</button>
    </form>
  </body>
</html>