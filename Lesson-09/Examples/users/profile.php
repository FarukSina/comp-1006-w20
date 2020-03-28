<?php
  require_once('../_config.php');

  session_start();

  // If they're not logged in, redirect them
  if (!isset($_SESSION['user'])) {
    $_SESSION['errors'][] = "You must log in";
    header('Location: ./login.php');
    exit;
  }

  // Assign the user
  $user = $_SESSION['user'];
?>

<?php include('_partials/_header.php') ?>

  <div class="container">
    <header class="jumbotron my-5">
      <div class="row">
        <div class="col-5">
          <img src="http://api.adorable.io/avatars/300/<?= $user['email'] ?>" alt="Your avatar self." class="img-fluid img-thumbnail">
        </div>

        <div class="col-7">
          <h1 class="display-4">Hello <strong><?= "{$user['first_name']} {$user['last_name']}" ?></strong></h1>
          <p class="lead">Welcome AUTHOR!</p>
          <hr class="my-4">
          <p>
            Your personalized experience awaits <strong>YOU!</strong>
          </p>
        </div>
      </div>
    </header>

    <a class="btn" href="logout.php">Logout</a>
  </div>

<?php include('_partials/_footer.php') ?>