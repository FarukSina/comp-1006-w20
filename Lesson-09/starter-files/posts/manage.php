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
              
              <!-- Links to manage the posts -->
            </div>
          </div>
        <?php endforeach ?>  
      <?php endif ?>
    </div>
  </div>

<?php include('_partials/_footer.php') ?>