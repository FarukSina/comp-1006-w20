<?php
  var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <div>
      <label for="name">Full Name:</label><br>
      <input name="name">
    </div>

    <div>
      <label for="age">Age:</label><br>
      <input name="age">
    </div>

    <div>
      <label for="married">Married:</label><br>
      <input type="radio" name="married" value="true"> yes
      <input type="radio" name="married" value="false"> no
    </div>

    <button type="submit">Submit</button>
  </form>
</body>
</html>