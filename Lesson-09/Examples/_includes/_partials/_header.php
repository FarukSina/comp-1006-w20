<?php
  $page = $page ?? 'home';
  $page_title = $page_title ?? 'Bloggin\' With Style';  
?>

<!DOCTYPE html>
<html lang="en" class="<?= $page ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_PATH ?>/css/styles.css">

    <title><?= $page_title ?></title>
  </head>

  <body class="<?= $page ?>">
    <?php include_once('_partials/_notification.php') ?>
    <?php include_once('_partials/_nav.php') ?>