<?php
  require_once('../_config.php');
  authorized_or_redirect();
  
  include_once('_utilities/_connect.php');
  $sql = "SELECT * FROM posts WHERE user_id = {$_SESSION['user']['id']}";
  $conn = connect();
  $posts = $conn->query($sql)->fetchAll();

  $page = "manage";
  $page_title = "Manage Posts";
?>

<?php include('_partials/_header.php') ?>

  <div class="container">
    <header class="jumbotron my-5">
      <h1 class="display-4">Manage Posts</h1>
      <p class="lead">Edit and Prosper! Or DELETE and Vanquish!!!</p>
    </header>

    <div>
      <?php if (count($posts) > 0): ?>
        <?php foreach ($posts as $post): ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                <a href="<?= BASE_PATH ?>/posts/show.php?id=<?= $post['id'] ?>">
                  <?= $post['title'] ?>
                </a>  
              </h5>
              
              <p class="card-text"><?= $post['synopsis'] ?></a></p>
              
              <?php if (authorized()): ?>
                <hr class="my-3">
                <a href="<?= BASE_PATH ?>/posts/edit.php?id=<?= $post['id'] ?>" class="btn mr-3">Edit</a>
                <a href="<?= BASE_PATH ?>/posts/delete.php?id=<?= $post['id'] ?>" class="btn" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
              <?php endif ?>
            </div>
          </div>
        <?php endforeach ?>  
      <?php endif ?>
    </div>
  </div>

<?php include('_partials/_footer.php') ?>