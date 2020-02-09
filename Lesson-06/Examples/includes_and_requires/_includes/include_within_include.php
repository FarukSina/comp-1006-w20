<p>I'm including a file outside of my folder:</p>
<?php
  // Fails because relative paths are from the executing file
  include('../nested_includes.php');

  // Passes because it's not relative to /index.php (confusing huh?)
  include('./nested_includes.php');
?>