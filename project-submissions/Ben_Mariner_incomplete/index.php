<?php
  // Step 1: (2 points) Include your connection
  // CREATE YOUR CONNECTION BELOW THIS LINE
  include('./_connect.php');
  // Step 2: (5 points) Retrieve all the 'supers' rows from your database
  // CREATE YOUR QUERY LOGIC BELOW THIS LINE
  $result = mysqli_query($conn, "SELECT * FROM supers");
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  ?>
<!-- Step 3: (2 points) Include your header here -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Favourite Movies</title>
</head>
<body>
  
</body>
</html>
<!-- Step 4: (2 points) Create a navigation bar for home.php and new.php -->
<!-- CREATE YOUR NAVIGATION HTML BELOW THIS LINE -->
<body>
  <table>
  <thead>
  <tr>
  <th>Home</th>
  <th>New</th>
  </tr>
  </thead>
<!-- Step 5: (15 points) Create a table that display each row from the database -->
<!-- You only need to display the first_name, last_name, date_of_birth, -->
<!-- alias, active, and hero columns -->
<tbody>
  <?php
  foreach ($rows as $row){
    echo "<tr>";
    echo "<td>{$row['first_name']}</td>";
    echo "<td>{$row['last_name']}</td>";
    echo "<td>{$row['date_of_birth']}</td>";
    "<td>";
    echo "<a href = './edit.php?id={$row['id']}'>edit</a>";
    echo " | ";
    echo "<a href = './delete.php?id={$row['id']}'>delete</a>";
    echo "</td>";
    echo "</tr>";

  }
  ?>
  </tbody>
  </table>
<!-- Step 6: (6 points) Create action links pointing to 'edit.php' and 'delete.php' -->
<!-- Ensure there was one edit and delete link for each row -->
<?php
include('./edit.php');
include('./delete.php');
?>
<!-- CREATE YOUR TABLE BELOW THIS LINE -->


<!-- Step 7: (2 points) Include your footer here -->
</body>
</html>
<footer>
  <p><small>&copy; Project_01 Favourite Movie, All Rights Reserved</small></p>
</footer>


<!-- TOTAL POINTS POSSIBLE: 34 -->
