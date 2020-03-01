<?php
  require_once('./_config.php');
  var_dump($path);
  // Step 1: (2 points) Include your connection
  // CREATE YOUR CONNECTION BELOW THIS LINE
    include_once('_partials/_header.php'); // Connection included with header
    $conn = connect();
  // Step 2: (5 points) Retrieve all the 'supers' rows from your database
  // CREATE YOUR QUERY LOGIC BELOW THIS LINE
    $sql = "SELECT * FROM supers";
    $stmt = $conn->query($sql);
    $rows = $stmt->fetchAll();
    
    var_dump($_GET);
  var_dump($_POST);
?>

<!-- Step 3: (2 points) Include your header here -->
  <!-- Done Above, see line 4 -->
<!-- Step 4: (2 points) Create a navigation bar for home.php and new.php -->
<!-- CREATE YOUR NAVIGATION HTML BELOW THIS LINE -->
  <!-- Include Nav Styles -->
<!-- Step 5: (15 points) Create a table that display each row from the database -->
<!-- You only need to display the first_name, last_name, date_of_birth, -->
<!-- alias, active, and hero columns -->

<!-- Step 6: (6 points) Create action links pointing to 'edit.php' and 'delete.php' -->
<!-- Ensure there was one edit and delete link for each row -->

<!-- CREATE YOUR TABLE BELOW THIS LINE -->
  <main>
  <aside>
    <a href="new.php">Create a Super</a>
  </aside>
    <table>
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>DOB</th>
          <th>Alias</th>
          <th>Active</th>
          <th>Hero</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php
          // Foreach to display the column data (<td></td>)
          foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>{$row['first_name']}</td>";
            echo "<td>{$row['last_name']}</td>";
            echo "<td>{$row['date_of_birth']}</td>";
            echo "<td>{$row['alias']}</td>";
            echo "<td>{$row['active']}</td>";
            echo "<td>{$row['hero']}</td>";
            echo "<td>";
            echo "<a href='./edit.php?id={$row['id']}'>edit</a>";
            echo "|";
            echo "<a href='./delete.php?id={$row['id']}'>delete</a>";
            echo "</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </main>


<!-- Step 7: (2 points) Include your footer here -->
  <?php include_once('_partials/_footer.php'); ?>


<!-- TOTAL POINTS POSSIBLE: 34 -->