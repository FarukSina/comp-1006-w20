<?php

  var_dump($_POST);
  var_dump($_FILES);

  // Validating our file
  if (empty($_FILES['image']['tmp_name'])) {
    echo "Your file couldn't be uploaded.";
    switch ($_FILES['image']['error']) {
      case 1:
        echo "<br>Your file size was too big. Limit is 2mb";
        exit;
    }
    exit;
  }

  // Validating max size
  $max = 1024 * 1024 * 32; // 32mb

  if (filesize($_FILES['image']['tmp_name']) > $max) {
    echo "File is too big. Limit is 2mb.";
    exit;
  }

  // Validate image type
  $file_content_type = mime_content_type($_FILES['image']['tmp_name']);
  if (!preg_match('/image\/png/i', $file_content_type)) {
    echo "Only PNG files are permitted. Please upload a valid file type.";
    exit;
  }

  $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

  move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/{$_POST['name']}.{$ext}");

  echo "Your file was uploaded successfully";