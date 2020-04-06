<?php

  // Setting our own error handler for standard errors
  set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    $date = date("d-m-Y H:i:s");
    throw new Exception("[{$date}][ERROR]: {$errstr}\nFILE: {$errfile}\nLINE: {$errline}\n");
  });

  // Will result in a reference error
  $reference = 5;
  echo $reference;
  echo $Reference = 10;
  var_dump($reference, $Reference);

  // Semi-colon error
  $mynameis = "Shaun";
  echo $mynameis;

  // Missing brace/bracket issues
  if (true) {
    echo "This is true";
  } else {
    echo "booya";
  }
  
  echo "Hi there";

  // Suppressing errors
  try {
    echo "Hi we are in the try block";
    echo $name;
  } catch (Exception $e) {
    echo "<br>There was a problem with the application. Please contact your administrator.";
    
    // Custom error.log location (should be above the www directory)
    error_log($e->getMessage() . "\n", 3, 'error.log');

    // Default PHP error.log location
    error_log($e->getMessage() . "\n");
  }