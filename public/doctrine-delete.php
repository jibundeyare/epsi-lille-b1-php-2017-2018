<?php
// doctrine-delete.php
use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$sql = "DELETE
FROM user
WHERE id >= ?";
$count = $conn->executeUpdate($sql, [6]);
echo $count.'<br />';
