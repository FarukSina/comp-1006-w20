<?php
  require_once('../_config.php');
  authorized_or_redirect();

  // Again, this session variable will exist if the nav has been
  // included.
  $form_values = $_SESSION['form_values'] ?? $post ?? null;
  unset($_SESSION['form_values']);
?>

<form action="<?= BASE_PATH ?>/posts/<?= $action ?>.php" method="post">
  <?php if ($action === 'update'): ?>
    <input type="hidden" name="id" value="<?= $form_values['id'] ?>">
  <?php endif ?>

  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" name="title" value="<?= $form_values['title'] ?? null ?>">
  </div>

  <div class="form-group">
    <label for="synopsis">Synopsis:</label>
    <textarea type="text" class="form-control" name="synopsis"><?= $form_values['synopsis'] ?? null ?></textarea>
  </div>

  <div class="form-group">
    <label for="content">Content:</label>
    <textarea name="content" id="summernote"><?= $form_values['content'] ?? null ?></textarea>
  </div>

  <button class="btn" type="submit">Submit</button>
</form>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    $('#summernote').summernote({
      height: 500
    });
  });
</script>