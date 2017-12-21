<?php

// initialisation et ajout de données

$myArray = [];
//$myArray = array(); // old syntax

$myArray[] = 'lorem';
$myArray[] = 'ipsum';

var_dump($myArray);

echo $myArray[0] . "<br />";
echo $myArray[1] . "<br />";

$myArray2 = [
  'host' => 'localhost',
  'port' => 3306,
  'login' => 'root',
];

$myArray2['password'] = '123';
$myArray2['name'] = 'cours_php';

var_dump($myArray2);

echo $myArray2['host'] . "<br />";
echo $myArray2['port'] . "<br />";
echo $myArray2['login'] . "<br />";
echo $myArray2['password'] . "<br />";
echo $myArray2['name'] . "<br />";

$myArray3 = [
  'foo',
  'bar',
  'baz',
];

// même résultat que :
// $myArray3 = [
//   0 => 'foo',
//   1 => 'bar',
//   2 => 'baz',
// ];

echo $myArray3['0'] . "<br />";
echo $myArray3['1'] . "<br />";
echo $myArray3['2'] . "<br />";

$myArray4bis = [
  1 => 'foo',
  2 => 'bar',
];

$myArray4bis[] = 'baz';
var_dump($myArray4bis);

// suppression de données

$myArray4 = [42, 0, 123, 2];

var_dump($myArray4);
unset($myArray4[1]); // attention : ne réindexe pas le tableau
var_dump($myArray4);

$myArray4 = array_values($myArray4);
var_dump($myArray4);

$offset = 1;
$length = 1;
$removed = array_splice($myArray4, $offset, $length); // attention : réindexe le tableau
var_dump($myArray4);
var_dump($removed);
