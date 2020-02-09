<?php require_once('../_config.php') ?>
<?php include_once('_partials/_header.php') ?>
<?php
  $conn = connect();
  $result = mysqli_query($conn, "SELECT * FROM countries");
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<header class="main-heading">
  <h1>Countries</h1>
</header>

<div class="countries">
  <?php
    foreach ($rows as $row) {
      include('_partials/_country.php');
    }
  ?>
</div>

<?php include_once('_partials/_footer.php') ?>