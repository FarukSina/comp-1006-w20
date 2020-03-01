<?php

  // Step 1: (12) Using either MySQLi or PDO
  //    Create a connection to your MySQL DB and store it in a variable named $conn
  // CREATE YOUR CONNECTION BELOW THE LINE
    if(file_exists(dirname(__FILE__).'/.env.php')){
      require_once('.env.php');
    }else{
      echo "ENV ERROR: Check Connection File";
    }

    function connect(){

      // Building Connection
      $dsn = 'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB');
      
      try{
        
        // Creating a PDO Instance
        $conn = new PDO($dsn, getenv('DB_USER'), getenv('BD_PASS'));

        // Setting Default Fetch Mode
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Enables Exception Throwing
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Enables Default and Safety Fallback Prepares
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      }catch(PDOException $e){
        echo "General Connection Error: ".$e->getMessage();
      }finally{
        return $conn;
      }
    }

  // TOTAL POINTS POSSIBLE: 6

?>