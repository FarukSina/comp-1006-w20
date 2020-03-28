<?php

  // setting our absolute file path
  $include_path = dirname(__FILE__) . '\_includes';
  set_include_path($include_path);

  // setting our absolute link path
  $document_root = realpath($_SERVER['DOCUMENT_ROOT']);
  
  $application_root = dirname(__FILE__);
  
  $link_path = str_replace($document_root, '', $application_root);
  
  define('BASE_PATH', $link_path);
  define('BASE_FILE_PATH', $application_root);

  // Authentication check
  function authorized () {
    if (session_status() === PHP_SESSION_NONE) session_start();
    return $_SESSION['user'] ?? false;
  }

  function redirect ($path) {
    header('Location: ' . BASE_PATH . $path);
    exit;
  }

  function redirect_with_messages ($path, $messages, $type) {
    $_SESSION[$type] = $messages;
    redirect($path);
  }

  function redirect_with_errors ($path, $errors) {
    redirect_with_messages($path, $errors, 'errors');
  }

  function redirect_with_successes ($path, $successes) {
    redirect_with_messages($path, $successes, 'successes');
  }

  function authorized_or_redirect($path = '/sessions/login.php') {
    if (!authorized()) redirect_with_errors($path, ['You are not authorized for this action.']);
  }

?>