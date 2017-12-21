<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$conn->insert('user', [
  'login' => 'lorem',
  'email' => 'lorem@email.com',
  'password' => password_hash('123', PASSWORD_DEFAULT),
]);

$id = $conn->lastInsertId();
echo 'last insert id : '.$id.'<br />';

$sql = "SELECT *
FROM user
WHERE id = ?";
$stmt = $conn->executeQuery($sql, [$id]);
$rows = $stmt->fetchAll();
var_dump($rows);
