<?php

  var_dump($_FILES);
  // Enforce only images
  $file_content_type = mime_content_type($_FILES['image']['tmp_name']);

  if (!preg_match('/^image\/(png|jpg|jpeg|gif|svg)/i', $file_content_type)) {
    echo "File must be a valid image type";
    exit;
  }

  // Enforce 1mb file size limit
  $max = 1025 * 1024;
  $file_size = filesize($_FILES['image']['tmp_name']);
  if ($file_size > $max || $file_size == 0) {
    echo "File isn't within 1b and 1mb: {$file_size}";
    exit;
  }

  // Get the file extension
  $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

  // Move the image
  move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/{$_POST['name']}.{$ext}");
  echo "The file was uploaded successfully";