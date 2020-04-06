<?php require('../_config.php') ?>
<?php include('_partials/_header.php') ?>
    
  <div class="container">
    <header class="jumbotron my-5">
      <h1 class="display-4">Registration</h1>
      <p class="lead">All the fun! All the glory!</p>
      <hr class="my-4">
      <p>
        Registration will provide you access to create literary masterworks!
      </p>
    </header>

    <section class="mb-5">
      <form action="<?= BASE_PATH ?>/users/insert.php" method="post" novalidate>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="first_name">First Name:</label>
              <input class="form-control" type="text" name="first_name" required placeholder="Herman" value="<?= $form_values['first_name'] ?? null ?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input class="form-control" type="text" name="last_name" required placeholder="Munster" value="<?= $form_values['last_name'] ?? null ?>">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="email">Email:</label>
              <input class="form-control" type="email" name="email" placeholder="herman.munster@mockingbird.com" required value="<?= $form_values['email'] ?? null ?>">
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="email_confirmation">Email Confirmation:</label>
              <input class="form-control" type="email" name="email_confirmation" placeholder="herman.munster@mockingbird.com" required value="<?= $form_values['email_confirmation'] ?? null ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="password">Password:</label>
              <input class="form-control" type="password" name="password" required>
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="password_confirmation">Password Confirmation:</label>
              <input class="form-control" type="password" name="password_confirmation" required>
            </div>
          </div>
        </div>

        <button class="btn" type="submit">Register</button>
      </form>
    </section>
  </div>

<?php include('_partials/_footer.php') ?>