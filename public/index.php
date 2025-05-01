<?php
require_once '../vendor/autoload.php';
require_once "../framework/autoload.php";
require_once '../controllers/MainController.php';
require_once "../controllers/ObjectController.php";
require_once '../controllers/KinDzaDzaController.php';
require_once '../controllers/IShagauPoMoskveController.php';
require_once '../controllers/KinDzaDzaImageController.php';
require_once '../controllers/IShagauPoMoskveImageController.php';
require_once '../controllers/KinDzaDzaInfoController.php';
require_once '../controllers/IShagauPoMoskveInfoController.php';
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
// $url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$context = [];
// $controller = new Controller404($twig);

$pdo = new PDO("mysql:host=localhost;dbname=movies;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/kin-dza-dza", KinDzaDzaController::class);
$router->add("/cinema-objects/(?P<id>\d+)", ObjectController::class);
$router->get_or_default(Controller404::class);

// if ($url == "/"){
//     $controller = new MainController($twig);
// }

// if ($controller){
//     $controller->setPDO($pdo);
//     $controller->get();
// }