<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

// lecture
$sql = "SELECT * FROM `user`";

try {
  $stmt = $conn->query($sql);
} catch (Exception $e) {
  echo $e->getMessage();
  exit();
}

while ($row = $stmt->fetch()) {
    echo $row['id'] . "<br />";
    echo $row['login'] . "<br />";
    echo $row['password'] . "<br />";
    echo $row['email'] . "<br />";
}

// insertion
$result = $conn->insert('user', [
  'login' => 'jwage',
  'email' => null,
  'password' => password_hash('123', PASSWORD_DEFAULT),
]);
var_dump($result);

$result = $conn->insert('user', [
  'login' => 'jwage2',
  'email' => 'jwage2@email.com',
  'password' => password_hash('123', PASSWORD_DEFAULT),
]);
var_dump($result);

// modification
$result = $conn->update('user', [
  'login' => 'jwage.bis',
  'email' => 'jwage.bis@email.com',
], ['id' => 5]);
var_dump($result);

// suppression
$result = $conn->delete('user', ['id' => 6]);
var_dump($result);

// requête en écriture (insert, update, delete)
try {
  $result = $conn->executeUpdate('DELETE FROM `user` WHERE id > 6');
  var_dump($result);
} catch (Exception $e) {
  echo $e->getMessage();
  exit();
}
