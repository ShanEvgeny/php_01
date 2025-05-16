<?php
require_once '../vendor/autoload.php';
require_once "../framework/autoload.php";
require_once '../middlewares/LoginRequiredMiddleware.php';
require_once '../controllers/MainController.php';
require_once "../controllers/ObjectController.php";
require_once "../controllers/SearchController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/CinemaObjectCreateController.php";
require_once "../controllers/CinemaTypeCreateController.php";
require_once "../controllers/CinemaObjectDeleteController.php";
require_once "../controllers/CinemaObjectUpdateController.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$title = "";
$template = "";
$context = [];

$pdo = new PDO("mysql:host=localhost;dbname=movies;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/cinema-objects/(?P<id>\d+)", ObjectController::class);
$router->add("/cinema-objects/create", CinemaObjectCreateController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/object-types/create", CinemaTypetCreateController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/cinema-objects/(?P<id>\d+)/delete", CinemaObjectDeleteController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/cinema-objects/(?P<id>\d+)/edit", CinemaObjectUpdateController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/search", SearchController::class);
$router->get_or_default(Controller404::class);