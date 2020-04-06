<?php
  require_once('../_config.php');
  include_once('_utilities/_connect.php');

  $sql = "SELECT * FROM posts";
  $conn = connect();
  $posts = $conn->query($sql)->fetchAll();
?>

<?php include('_partials/_header.php') ?>

  <div class="container">
    <header class="jumbotron my-5">
      <h1 class="display-4">The Post Archives</h1>
      <p class="lead">Become a member if you want to get those thoughts on a page!</p>
    </header>

    <div>
      <!-- A list of posts -->
    </div>
  </div>

<?php include('_partials/_footer.php') ?>