<!DOCTYPE html>
  <head>
    <title>Adding Countries</title>
  </head>

  <body>
    <!-- The form for creating a new country -->
    <form action="./insert.php" method="post">
      <div>
        <label>Country Name:</label>
        <input name="name">
      </div>

      <div>
        <label>Country Description:</label>
        <textarea name="description"></textarea>
      </div>

      <div>
        <label>Country Population:</label>
        <input type="num" name="population">
      </div>

      <button type="submit">Create</button>
    </form>
  </body>
</html>