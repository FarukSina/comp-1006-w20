<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= BASE_PATH ?>">Bloggin' With Style</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= BASE_PATH ?>">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_PATH ?>/users/profile.php">Profile</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_PATH ?>/posts/index.php">Posts</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_PATH ?>/posts/manage.php">Manage Posts</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_PATH ?>/posts/new.php">New Post</a>
      </li>
    </ul>

    <ul class="navbar-nav my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_PATH ?>/sessions/login.php">Login</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_PATH ?>/users/register.php">Register</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_PATH ?>/sessions/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>