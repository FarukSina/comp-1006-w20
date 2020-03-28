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
            </div>
          </div>
        <?php endforeach ?>  
      <?php endif ?>
    </div>
  </div>

<?php include('_partials/_footer.php') ?>