<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$connectionParams = Yaml::parseFile(__DIR__.'/../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

var_dump($_POST);

/**
 * injections de code possibles :
 * indicateur qu'une injection est possible : '); --
 * injection innoffensive réussie : ', '', ''); --
 * injection aggressive réussie : ', '', ''); UPDATE injection SET email = 'tata@example.com', nom = 'tata', prenom = 'tata' WHERE id = 1;--
 */

if ($_POST) {
    // version vulnérable aux injections sql
    // $sql = "
    // INSERT INTO injection (email, nom, prenom)
    // VALUES ('".$_POST['email']."', '".$_POST['nom']."', '".$_POST['prenom']."');
    // ";

    // version protégée contre les injections sql
    $sql = "
    INSERT INTO injection (email, nom, prenom)
    VALUES (".$conn->quote($_POST['email']).", ".$conn->quote($_POST['nom']).", ".$conn->quote($_POST['prenom']).");
    ";

    var_dump($sql);

    $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <form method="post">
            <input type="text" name="email" value="" placeholder="email"/><br />
            <input type="text" name="nom" value="" placeholder="nom" /><br />
            <input type="text" name="prenom" value="" placeholder="prénom" /><br />
            <button>OK</button>
        </form>

    </body>
</html>
