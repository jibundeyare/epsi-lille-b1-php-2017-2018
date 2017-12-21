<?php

// loops.php
$myArray1 = [42, 123, 0, 2];

for ($i = 0; $i < count($myArray1); $i++) {
  if ($i != 0) {
    echo $myArray1[$i] . "<br />";
  }
}

$myArray2 = [
  'login' => 'toto',
  'email' => 'toto@email.com',
  'password' => password_hash('123', PASSWORD_DEFAULT),
];

foreach ($myArray2 as $value) {
  echo $value . "<br />";
}

foreach ($myArray2 as $key => $value) {
  if ($key != 'password') {
    echo $key . " : " . $value . "<br />";
  }
}
