<?php require_once('./_config.php') ?>
<?php include_once('_partials/_header.php') ?>

<!-- Featured Country -->
<?php
  $conn = connect();
  $result = mysqli_query($conn, "SELECT * FROM countries ORDER BY RAND() LIMIT 1");
  $row = mysqli_fetch_assoc($result);
?>

<header class="main-heading">
  <h1>Featured Country - <?= $row['name'] ?></h1>
</header>

<?php include_once('_partials/_country.php') ?>

<?php include_once('_partials/_footer.php') ?>