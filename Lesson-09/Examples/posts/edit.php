<?php
  require_once('../_config.php');
  authorized_or_redirect();

  $page = 'post-edit';
  $page_title = 'Edit Post';

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
      <h1 class="display-4">Re-Smith<br><small><q><?= $post['title'] ?></q></small></h1>
      <p class="lead">Re-let your creativeness flow...</p>
    </header>

    <section>
      <?php
        $action = 'update';
        include_once(BASE_FILE_PATH . '/posts/_form.php');
      ?>
    </section>

    <div class="mt-4"><a href="<?= BASE_PATH ?>/posts">Back to blogs...</a></div>
  </div>

<?php include('_partials/_footer.php') ?>