<?php

// подключаем пакеты которые установили через composer
require_once "../vendor/autoload.php";
require_once "../framework/autoload.php";
require_once "../controllers/BaseSpaceTwigController.php";
require_once "../controllers/MainController.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/DescriptionController.php";
require_once "../controllers/ImageController.php";




// создаем загрузчик шаблонов, и указываем папку с шаблонами
// \Twig\Loader\FilesystemLoader -- это типа как в C# писать Twig.Loader.FilesystemLoader, 
// только слеш вместо точек
$loader = new \Twig\Loader\FilesystemLoader('../views');
// создаем собственно экземпляр Twig с помощью которого будет рендерить
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=firstdb;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/object/(?P<id>\d+)/history", DescriptionController::class);
$router->add("/object/(?P<id>\d+)/image", ImageController::class);
$router->get_or_default(DescriptionController::class);