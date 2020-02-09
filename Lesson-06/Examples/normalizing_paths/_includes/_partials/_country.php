<div class="country">
  <h3>
    <?= $row['name'] ?? null ?><br>
  </h3>
  <hr>
  <p>
    <?= $row['description'] ?>
  </p>
  <small><?= $row['population'] ?></small>
</div>