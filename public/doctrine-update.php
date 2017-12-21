<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$sql = "UPDATE user
SET login = :login
WHERE id = :id";
$count = $conn->executeUpdate($sql, [
  'login' => 'tutu',
  'id' => 1
]);
echo $count.'<br />';
