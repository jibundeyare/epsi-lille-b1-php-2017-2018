<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$q = empty($_GET['q']) ? '0':$_GET['q'];

// code vulnérable à une injection sql
$sql = "SELECT *
FROM user
WHERE id = ".$q." AND login != 'admin'";

// code NON vulnérable à une injection sql
// $sql = "SELECT *
// FROM user
// WHERE id = ".$conn->quote($q)." AND login != 'admin'";

$stmt = $conn->executeQuery($sql);
$row = $stmt->fetchAll();
var_dump($row);

// usage normal : demande d'affichage du user 14 (admin)
// http://localhost:8000/doctrine-sql-injection.php?q=14

// hack : injection de code sql
// http://localhost:8000/doctrine-sql-injection.php?q='' OR login = 'admin';--
