<?php

  // setting our absolute file path
  $path = dirname(__FILE__) . '\_includes';
  set_include_path($path);

  // setting our absolute link path
  $document_root = realpath($_SERVER['DOCUMENT_ROOT']);
  
  $application_root = dirname(__FILE__);
  
  $link_path = str_replace($document_root, '', $application_root);
  
  define('BASE_PATH', $link_path);

?>