<!-- This is an HTML comment and won't work inside PHP blocks -->
<!-- Below is a "PHP block". It is defined by the opening and closing PHP tags -->

<!-- This is an opening PHP tag. It defines the beginning of our PHP code -->
<?php
  
  // This is a PHP single-line comment
  /*
    This is a multi-line comment.
    Below is our first library function call:
      "echo" will display whatever output is provided as an argument. In this scenario it happens to be a string
  */
  echo "Not a bad day, eh?";

  // We will use "echo" quite often to output visual information to our users:
  echo "<h1>It was a rainy day!</h1>";

  // Variables allow us to store information to be used repeatedly:
  $name = "Shaun";

  // We can output the value of our variable using "echo":
  echo $name;

  // We can also output the value of our variable within a double quoted string (string template):
  echo "Hello, $name";

  // The same will not work for a single quoted string (string literal):
  echo 'Hello $name'; // Outputs: Hello $name

  // For that, we can use "string concatenation"
  echo 'Hello ' . $name;

  // Variables in PHP are NOT explicitly data typed but rather implicitly data typed:
  $a_string = "I'm a string because I have quotes around me";
  $an_integer = 2; // This is an integer because it is an unquoted number
  $a_float = 2.1; // This is a float because it has a decimal in it
  $a_boolean = true; // The keyword "true" implies this variable is a boolean

  // Implicit data-typing can have some oddities
  $still_an_integer = "5"; // This is still an integer even though it is in quotes:
  echo $still_an_integer + 2; // Equals 7

  // Variables in PHP can be reassigned with a new value of a different data type:
  $a_string = false; // This is valid, though definitely poor practice

?>
<!-- This is a closing PHP tag and it defines the end of our PHP code -->