<?php
  // We can write PHP and HTML in the same file because PHP is a pre-processing language
  var_dump($_GET); // The value of $_GET
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>$_GET Example</title>
</head>
<body>
  <!-- Below is known as a relative path. The "./" says "start in the directory this file is in". -->
  <a href="./get.php?name=Shaun McKinnon&age=41&married=true">click me</a>
</body>
</html>