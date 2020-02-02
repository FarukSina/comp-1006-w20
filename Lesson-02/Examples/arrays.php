<!-- Arrays -->
<?php

  // Creating an array using a function
  $my_arr = array();

  // Creating an array using an array literal
  $my_arr = [];

  // Creating an array using a function with initial values
  $my_arr = array('a', 'b', 'c', 'd');

  // Creating an array using an array literal with inital values
  $my_arr = ['a', 'b', 'c', 'd'];

  // Below is what the array structure will look like:
  $my_arr = [
              0  => 'a',
              1 => 'b',
              2 => 'c',
              3 => 'd'
            ];
  
  // Arrays can have a list of any values of any data types
  $my_arr = [true, "Shaun", 41, 35.63];

  // Adding a value to the end of an array
  array_push($my_arr, "I like cats");

  // Adding a value to the beginning of the array
  array_unshift($my_arr, "Boorakacha");

  // Accessing "Shaun" from the $my_arr array
  echo $my_arr[1];

  // Outputting an entire array cannot be done with the "echo" function
  // echo $my_arr; // Will output an error

  // Outputting an array's contents is made easy with var_dump
  var_dump($my_arr);

  // Nested array example
  $my_nested_arr = [
    41,
    "Shaun",
    [
      "Diablo",
      "3D Printing",
      "nerd things"
    ]
  ];

  // Accessing "3D Printing" from the nested array
  echo $my_nested_arr[2][1]; // "Diablo"

  // Dump the nested array structure
  var_dump($my_nested_arr);

  // Updating a value in an array
  $my_nested_arr[1] = "Bobby B Baby";
  var_dump($my_nested_arr);

  // Removing an item from the beginning of an array
  array_shift($my_nested_arr);

  // Removing an item from the end of the array
  array_pop($my_nested_arr);
  var_dump($my_nested_arr);

  // Removing a specific item from an array
  var_dump($my_arr);
  array_splice($my_arr, 3, 1);
  var_dump($my_arr);

  // Add new item after index 3
  array_splice($my_arr, 4, 0, "<h1>41</h1>");
  echo $my_arr[4];

?>