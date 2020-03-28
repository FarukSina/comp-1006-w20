<?php
  require_once('../_config.php');
  authorized_or_redirect();

  $page = 'post-new';
  $page_title = 'New Post';
?>

<?php include('_partials/_header.php') ?>

  <div class="container">
    <header class="jumbotron my-5">
      <h1 class="display-4">Smith a New Post</h1>
      <p class="lead">Let your creativeness flow...</p>
    </header>

    <section>
      <?php
        $action = 'insert';
        include_once(BASE_FILE_PATH . '/posts/_form.php');
      ?>
    </section>

    <div class="mt-4"><a href="<?= BASE_PATH ?>/posts">Back to blogs...</a></div>
  </div>

<?php include('_partials/_footer.php') ?>