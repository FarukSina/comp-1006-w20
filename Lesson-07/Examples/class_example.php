<?php

  // Below is our example class
  class Example {

    public $message;
    private $secret;

    // The constructor will execute when the class is instantiated
    function __construct ($message) {
      $this->message = $message;
      $this->secret = "PSST...";
    }

    public function display_message () {
      echo $this->message;
    }

    public function yell_message () {
      echo strtoupper($this->message);
    }

    public function get_secret () {
      return $this->secret;
    }

    public function set_secret ($val) {
      $this->secret = $val;
    }

  }

  $example = new Example("Hello World");
  $example->display_message();
  echo "<br>";
  $example->yell_message();
  echo "<br>";

  echo $example->message . "<br>";
  $example->message = "global conquering";
  $example->yell_message();
  echo "<br>";

  // echo $example->secret . "<br>";
  $example->set_secret("Boorakacha");
  echo $example->get_secret() . "<br>";