<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Uploading Images</title>
  </head>

  <body>
    <header>
      <h1>Uploading Images</h1>
    </header>

    <form action="upload.php" method="post" enctype="multipart/form-data">
      <div>
        <label for="name">Image Name:</label>
        <input type="text" name="name">
      </div>

      <div>
        <label for="image">Image:</label>
        <input type="file" name="image">
      </div>

      <button type="submit">Submit</button>
    </form>
  </body>
</html>