<?php

  // If uploaded file
  $file_location = "./default.json";

  if (!empty($_FILES['data']['tmp_name'])) {
    $file_content_type = mime_content_type($_FILES['data']['tmp_name']);
    if (!preg_match('/text\/plain/i', $file_content_type)) {
      echo "You data must be in JSON format";
      exit;
    }

    $res = move_uploaded_file($_FILES['data']['tmp_name'], "./uploads/{$_FILES['data']['name']}");

    if (!$res) {
      echo "There was an issue with the file you uploaded. Please try again.";
      exit;
    }

    $date = date("d-m-Y H:i:s");
    
    $file_location = "./uploads/{$_FILES['data']['name']}";
    file_put_contents('./log.log', "[{$date}][DATA UPLOAD]: {$file_location}");
  }

  // Process data
  $content = file_get_contents($file_location);
  $data = json_decode($content);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Document</title>
  </head>

  <body>
    <table>
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Age</th>
          <th>Date of Birth</th>
          <th>Marital Status</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?= $data->fullname->first ?> <?= $data->fullname->last ?></td>
          <td><?= $data->age ?></td>
          <td><?= $data->dob ?></td>
          <td><?= $data->married ? 'YES' : 'NO' ?></td>
        </tr>
      </tbody>
    </table>  
  </body>
</html>