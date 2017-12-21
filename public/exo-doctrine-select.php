<?php

// créez une nouvelle table `task`
// contenant les champs suivants :
// - id
// - title
// - done (valeur par défaut : non fait)
// - deadline date (champ optionnel)
// - deadline heure (champ optionnel)

// avec phpmyadmin, insérez quelques données de test :
// - au moins une tâche à faire sans deadline
// - au moins une tâche à faire avec deadline
// - au moins une tâche déjà faite avec ou sans deadline

// avec doctrine/dbal, affichez la liste des tâches à faire (avec ou sans date), ordonnées par deadline décroissante puis par titre

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$sql = "SELECT *
FROM task
WHERE done = FALSE";
$stmt = $conn->executeQuery($sql);
$rows = $stmt->fetchAll();

foreach ($rows as $row) {
  echo 'title: '.$row['title'].'<br />';
  echo 'date: '.$row['deadline_date'].'<br />';
  echo 'time: '.$row['deadline_time'].'<br />';
  echo '<br />';
}
