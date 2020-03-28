<?php
  require_once('../_config.php');
  include_once('_utilities/_connect.php');

  // Get the blog post
  $conn = connect();

  $sql = "SELECT * FROM posts WHERE id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt->execute();
  $post = $stmt->fetch();

  if (!$post) redirect_with_errors('/posts', 'That blog is not available');
?>

<?php include('_partials/_header.php') ?>

  <div class="container">
    <header class="jumbotron my-5">
      <div class="col-7">
        <h1 class="display-4"><?= $post['title'] ?></h1>
        <hr class="my-4">
        <p>
          <?= $post['synopsis'] ?>
        </p>
      </div>
    </header>

    <div>
      <?= $post['content'] ?>
    </div>

    <div class="mt-4"><a href="<?= BASE_PATH ?>/posts">Back to blogs...</a></div>
  </div>

<?php include('_partials/_footer.php') ?>