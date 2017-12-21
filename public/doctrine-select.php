<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$sql = "SELECT *
FROM user
WHERE login LIKE ?";
$stmt = $conn->executeQuery($sql, ['t%']);
$rows = $stmt->fetchAll();
echo '<pre>';
var_dump($rows);
echo '</pre>';

$sql = "SELECT *
FROM user
WHERE login LIKE ?";
$stmt = $conn->executeQuery($sql, ['t%']);
while ($row = $stmt->fetch()) {
  echo '<pre>';
  var_dump($row);
  echo '</pre>';
}

$sql = "SELECT *
FROM user
WHERE id LIKE :id";
$row = $conn->fetchAssoc($sql, [
  'id' => 2,
]);
echo '<pre>';
var_dump($row);
echo '</pre>';
