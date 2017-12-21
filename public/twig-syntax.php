<?php

require __DIR__.'/../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
$twig = new Twig_Environment($loader, array(
    // 'cache' => __DIR__.'/../var/cache',
));

$text = 'lorem ipsum';
$integer = 123;
$float = 3.14159265358979323846264338327950288419716939937510;
$date = new DateTime();
$rows = [
    ['email' => 'foo@exmaple.com'],
    ['email' => 'bar@exmaple.com'],
    ['email' => 'baz@exmaple.com'],
];
$json = <<<EOT
[
    {"email": "foo@exmaple.com"},
    {"email": "bar@exmaple.com"},
    {"email": "baz@exmaple.com"}
]
EOT;
$rows2 = json_decode($json);

$template = $twig->load('twig-syntax.html.twig');
echo $template->render([
    'text' => $text,
    'integer' => $integer,
    'float' => $float,
    'date' => $date,
    'rows' => $rows,
    'rows2' => $rows2,
]);
