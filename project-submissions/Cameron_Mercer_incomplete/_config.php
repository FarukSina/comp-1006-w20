<?php

    // Create a slash fix function for heruko that will replace realpath
    function normalize_slashes($path){
        return str_replace('\\', '/', $path);
    } 

    // Create Include Path
    $path = dirname(__FILE__)."\_inc";

    set_include_path(normalize_slashes($path));

    // Setting Document Root Path - The servers path to its root application folder.
    $document_root = normalize_slashes($_SERVER['DOCUMENT_ROOT']);

    // Setting Application Root Path - The servers path to the origin folder of the current file.
    $application_root = normalize_slashes(dirname(__FILE__));
    
    // Setting Root Link Path: $application_root - $document_root
    $link_path = str_replace($document_root, null, $application_root);

    // Defining an alias for $link_path
    define('BASE_PATH', $link_path);
    

?>