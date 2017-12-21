<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$count = $conn->insert('user', [
  'login' => 'foo',
  'email' => 'foo@email.com',
  'password' => password_hash('123', PASSWORD_DEFAULT),
]);
echo $count.'<br />';

$sql = "DELETE
FROM user
WHERE id > 6";

$count = $conn->executeUpdate($sql);
echo $count.'<br />';
