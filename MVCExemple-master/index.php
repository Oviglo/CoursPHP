<?php

define('BASEPATH', 'CoursPHP/MVCExemple-master');

require_once __DIR__.'/vendor/autoload.php';
spl_autoload_register(function ($className) {
    // POUR MAC $className = str_replace('\\', '\/', $className);
    $className = 'src/'.$className.'.php';
    if (file_exists($className)) {
        require_once $className;
    }
});
// Init twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/src/View');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__.'/cache',
    'debug' => true,
]);
$twig->addGlobal('path', BASEPATH);
var_dump($_SERVER['REQUEST_URI']);

use Controller\FrontController;

$frontController = new FrontController();
$frontController->setBasePath(BASEPATH);

$templateInfos = $frontController->run();

$template = $twig->load($templateInfos['template']);
echo $template->render($templateInfos['data']);
