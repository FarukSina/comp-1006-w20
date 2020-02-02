<?php

  // Our database connection
  include('./.env.php');
  $conn = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB'));

  // Fetch the rows
  $result = mysqli_query($conn, "SELECT * FROM countries");
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  var_dump($rows);
?>

<!DOCTYPE html>
  <head>
    <style>
      table, th, td { border: 1px solid black; padding: 0.25em; }
    </style>

    <title>Countries</title>
  </head>

  <body>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Destination</th>
          <th>Population</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php
          foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td>{$row['population']}</td>";
            echo "<td>";
            echo "<a href='./edit_form.php?id={$row['id']}'>edit</a>";
            echo " | ";
            echo "<a href='./delete.php?id={$row['id']}'>delete</a>";
            echo"</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </body>
</html>