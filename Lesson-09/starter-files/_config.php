<?php

  // setting our absolute file path
  $include_path = dirname(__FILE__) . '\_includes';
  set_include_path($include_path);

  // setting our absolute link path
  $document_root = realpath($_SERVER['DOCUMENT_ROOT']);
  
  $application_root = dirname(__FILE__);
  
  $link_path = str_replace($document_root, '', $application_root);
  
  define('BASE_PATH', $link_path);
  define('BASE_FILE_PATH', $application_root); // Gives us an application path link

  // Helpful Functions
  

?>