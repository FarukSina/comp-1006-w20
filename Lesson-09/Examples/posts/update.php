<?php

  require_once('../_config.php');

  session_start();

  // If they're not logged in, redirect them
  authorized_or_redirect();

  // Assign the user
  $user = $_SESSION['user'];

  // Validate our data
  if (empty($_POST['title'])) {
    $_SESSION['form_values'] = $_POST;
    redirect_with_errors("/posts/edit.php?id={$_POST['id']}", ['Please include a title']);
  }
  
  // Normalize our data
  $_POST['title'] = ucwords(strtolower($_POST['title']));

  // Sanitize our data
  $_POST['title'] = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  $_POST['synopsis'] = filter_var($_POST['synopsis'], FILTER_SANITIZE_STRING);

  /*
    Sanitizing the HTML is a little trickier. We can't use
    filter_var() because it will strip out ALL tags
    including HTML tags. Instead we'll use preg_replace
    which will allow us to strip out only the script tags.
    This will prevent any XSS (cross site scripting) attacks.
  */
  $_POST['content'] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $_POST['content']);

  // The SQL (the user OWNS this post)
  $sql = "
    UPDATE posts SET
      title = :title,
      synopsis = :synopsis,
      content = :content
    WHERE
      id = :id
    AND
      user_id = {$user['id']}
  ";

  // Connect and write the edit post
  require_once('_utilities/_connect.php');
  $conn = connect();

  // Prepare, bind, and execute
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
  $stmt->bindParam(':synopsis', $_POST['synopsis'], PDO::PARAM_STR);
  $stmt->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
  $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
  $stmt->execute();

  // Check for errors
  if ($stmt->errorCode() !== "00000") {
    // Add the error message to the errors session array
    $_SESSION['form_values'] = $_POST;
    redirect_with_errors("/posts/edit.php?id={$_POST['id']}", ["There was an error updating this post."]);
  }

  redirect_with_successes("/posts/show.php?id={$_POST['id']}", ['The post was successfully updated. Please review your blog post.']);