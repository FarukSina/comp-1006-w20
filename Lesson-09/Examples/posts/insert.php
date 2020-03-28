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
    redirect_with_errors('/posts/new.php', ['Please include a title']);
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
    INSERT INTO posts (
      title, 
      synopsis, 
      content,
      user_id
    ) VALUES (
      :title,
      :synopsis,
      :content,
      {$user['id']}
    )
  ";

  // Connect and write the new post
  require_once('_utilities/_connect.php');
  $conn = connect();

  // Prepare, bind, and execute
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
  $stmt->bindParam(':synopsis', $_POST['synopsis'], PDO::PARAM_STR);
  $stmt->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
  $stmt->execute();

  // Check for errors
  if ($stmt->errorCode() !== "00000") {
    // Add the error message to the errors session array
    $_SESSION['form_values'] = $_POST;
    redirect_with_errors('/posts/new.php', ["There was an error creating this post."]);
  }

  // We want to direct the user to their post so they can view it
  $post_id = $conn->lastInsertId();

  redirect_with_successes("/posts/show.php?id={$post_id}", ['The post was successfully created. Please review your blog post.']);