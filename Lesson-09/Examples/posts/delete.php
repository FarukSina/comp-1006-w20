<?php

  require_once('../_config.php');
  authorized_or_redirect();

  // Assign the user
  $user = $_SESSION['user'];

  $sql = "DELETE FROM posts WHERE id = :id AND user_id = {$user['id']}";
  include_once('_utilities/_connect.php');
  $conn = connect();
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt->execute();

  // Check for errors
  if ($stmt->errorCode() !== "00000") {
    // Add the error message to the errors session array
    $_SESSION['form_values'] = $_POST;
    redirect_with_errors("/posts", ["There was an error deleting this post."]);
  }

  redirect_with_successes("/posts", ['The post was successfully updated. Please review your blog post.']);