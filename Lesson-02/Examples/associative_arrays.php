<!-- Associative Arrays -->
<?php

  /*
    THE CHALLENGE
  */
  // Using regular arrays
  $student_info_keys = [
    'name',
    'age',
    'dob'
  ];
  $students = [
    ['Shaun McKinnon', 41, '12-22-1978'],
    ['Gagandeep Kaur', 23, '01-02-1997'],
    ['Sam Whitaker', 20, '05-17-1999']
  ];

  // Using associative arrays
  $students = [
    [
      "name" => 'Shaun McKinnon',
      "age" => 41,
      "dob" => '12-22-1978'
    ],
    [
      "name" => 'Gagandeep Kaur',
      "age" => 23,
      "dob" => '01-02-1997'
    ],
    [
      "name" => 'Sam Whitaker',
      "age" => 20,
      "date of birth" => '05-17-1999'
    ]
  ];

  // Access Gagandeep's dob
  echo $students[2]["dob"];

?>