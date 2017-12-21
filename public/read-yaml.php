<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

$value = Yaml::parseFile(__DIR__.'/../config/db.yml');

// var_dump($value);

echo "<h1>db.yml</h1>";
echo "host: " . $value['host'] . "<br />";
echo "port: " . $value['port'] . "<br />";
echo "login: " . $value['login'] . "<br />";
echo "password: " . $value['password'] . "<br />";
echo "name: " . $value['name'] . "<br />";
