<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Data Uploader</title>
  </head>

  <body>
    <header>
      <h1>Data Uploader</h1>
    </header>

    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="data">
      <br>
      <button type="submit">Upload</button>
    </form>
  </body>
</html>