<?php

  var_dump($_POST);

  require_once('_connect.php');

  /* VALIDATION */
  // Validate the necessary fields are not empty
  $required_fields = [
    'first_name',
    'last_name',
    'address_1',
    'city',
    'province',
    'country',
    'postal_code',
    'email',
    'country_code',
    'area_code',
    'phone_number'
  ];
  
  foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
      echo "The {$field} cannot be empty";
      exit;
    }
  }

  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "The email isn't in a valid format. Please correct it.";
    exit;
  }
  /* END OF VALIDATION */

  /* NORMALIZATION */
  // Normalize the string fields (convert to lowercase and capitalize the first letter)
  foreach ($required_fields as $field) {
    if ($field === 'email') continue; // skips the email field
    $_POST[$field] = strtolower($_POST[$field]);
    $_POST[$field] = ucwords($_POST[$field]);
  }

  // Normalize the phone fields (extracting just the numbers and getting rid of the rest of the bits)
  foreach (['country_code', 'area_code', 'phone_number'] as $field) {
    // Find all the numbers
    preg_match_all('/\d+/', $_POST[$field], $matches);
    
    // $matches will be a multidimensional array. We need to flatten it
    $matches = array_merge(...$matches);

    // Convert the array into a string
    $_POST[$field] = implode("", $matches);
  }

  // Normalize the postal code
  preg_match('/(\p{L}).*(\d).*(\p{L}).*(\d).*(\p{L}).*(\d).*/', $_POST['postal_code'], $match);
  $match = array_splice($match, 1);
  $_POST['postal_code'] = implode("", $match);

  // Formatting the data to go into the database
  // fullname
  $_POST['fullname'] = "{$_POST['first_name']} {$_POST['last_name']}";

  // Add the dash to the phone number (string, string to insert, starting position, amount of string to replace)
  $_POST['phone_number'] = substr_replace($_POST['phone_number'], "-", 3, 0);

  // phone (1 (555) 555-5555 format)
  $_POST['phone'] = "{$_POST['country_code']} ({$_POST['area_code']}) {$_POST['phone_number']}";

  // postal code (uppercase the letters)
  $_POST['postal_code'] = strtoupper($_POST['postal_code']);

  // if the postal code is 6 characters and contains letters, add a space at character 3
  $_POST['postal_code'] = substr_replace($_POST['postal_code'], " ", 3, 0);

  // address
  $_POST['address_2'] = empty($_POST['address_2']) ? null : "{$_POST['address_2']}\n";
  $_POST['address'] = "{$_POST['address_1']}\n{$_POST['address_2']}{$_POST['city']}, {$_POST['province']}\n{$_POST['country']}, {$_POST['postal_code']}";

  // opt-in (set to boolean value);
  $_POST['newsletter_opt_in'] = isset($_POST['opt_in']);

  var_dump($_POST);
  /* END NORMALIZATION */

  /* SANITIZATION */
  // Sanitize the email
  $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

  // Sanitize all other values on their insertion
  $conn = connect();
  $sql = "
    INSERT INTO contacts (
      fullname,
      email,
      phone,
      address,
      newsletter_opt_in
    ) VALUES (
      :fullname,
      :email,
      :phone,
      :address,
      :newsletter_opt_in
    )
  ";
  $stmt = $conn->prepare($sql);

  // Sanitize using the binding
  $stmt->bindParam(':fullname', $_POST['fullname'], PDO::PARAM_STR); // Casts it to a string
  $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
  $stmt->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
  $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
  $stmt->bindParam(':newsletter_opt_in', $_POST['newsletter_opt_in'], PDO::PARAM_BOOL); // Casts to a boolean
  /* END SANITIZATION */

  // Insert our row
  $stmt->execute();

  // Check for errors
  if ($stmt->errorCode() !== "00000") {
    echo "There was an issue inserting the row: ";
    var_dump($stmt->errorInfo());
  } else {
    echo "The row was inserted successfully";
  }

?>