<?php

require __DIR__.'/../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
$twig = new Twig_Environment($loader, array(
    // @note activer en prod
    // 'cache' => __DIR__.'/../var/cache',
));

$greetings = 'Salut Twig !';

$template = $twig->load('hello-twig.html.twig');
echo $template->render([
    'greetings' => $greetings,
]);
