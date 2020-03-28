<?php
  require_once('../_config.php');

  // Before we render the form let's check for form values
  session_start();
  $form_values = $_SESSION['form_values'] ?? null;

  // Clear the form values
  unset($_SESSION['form_values']);
?>

<?php include('_partials/_header.php') ?>

  <div class="container">
    <header class="jumbotron my-5">
      <h1 class="display-4">Login</h1>
      <p class="lead">Master Wordsmith!</p>
      <hr class="my-4">
      <p>
        Your personalized experience awaits <strong>YOU!</strong>
      </p>
    </header>

    <section class="mb-5">
      <form action="<?= BASE_PATH ?>/sessions/authenticate.php" method="post">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="email">Email:</label>
              <input class="form-control" type="email" name="email" placeholder="herman.munster@mockingbird.com" required value="<?= $form_values['email'] ?? null ?>">
            </div>
          </div>
          
          <div class="col">
            <div class="form-group">
              <label for="password">Password:</label>
              <input class="form-control" type="password" name="password" required>
            </div>
          </div>
        </div>

        <button class="btn" type="submit">Login</button>
      </form>
    </section>
  </div>

<?php include('_partials/_footer.php') ?>