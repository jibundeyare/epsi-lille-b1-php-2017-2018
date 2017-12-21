<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

// lecture paramètes db.yml
$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

// config bdd
$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

// config twig
$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
$twig = new Twig_Environment($loader, array(
    // 'cache' => __DIR__.'/var/cache',
));

// lecture de la bdd
$sql = 'SELECT * FROM task';
$stmt = $conn->executeQuery($sql);
$rows = $stmt->fetchAll();

// affichage du résultat dans twig
$template = $twig->load('tasks.html.twig');
echo $template->render([
    'rows' => $rows,
]);
