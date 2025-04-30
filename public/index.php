<?php
require_once '../vendor/autoload.php';
require_once '../controllers/MainController.php';
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
$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$context = [];
$controller = new Controller404($twig);

$pdo = new PDO("mysql:host=localhost;dbname=movies;charset=utf8", "root", "");

if ($url == "/"){
    $controller = new MainController($twig);
}
else if ($url == "/kin-dza-dza" || $url == "/kin-dza-dza/info" || $url == "/kin-dza-dza/image"){
    $is_info = $url == "/kin-dza-dza/info";
    $is_image = $url == "/kin-dza-dza/image";
    $context['is_info'] = $is_info;
    $context['is_image'] = $is_image;
    $controller = new KinDzaDzaController($twig);
    if ($is_image){
        $controller = new KinDzaDzaImageController($twig);
    }
    else if ($is_info){
        //$template = "kin-dza-dza_info.twig";
        $controller = new KinDzaDzaInfoController($twig);
    }
}    
else if ($url == "/i_shagau_po_moskve" || $url == "/i_shagau_po_moskve/info" || $url == "/i_shagau_po_moskve/image"){
    $is_info = $url == "/i_shagau_po_moskve/info";
    $is_image = $url == "/i_shagau_po_moskve/image";
    $context['is_info'] = $is_info;
    $context['is_image'] = $is_image;
    $controller = new IShagauPoMoskveController($twig);
    if ($is_image){
        $controller = new IShagauPoMoskveImageController($twig);
    }
    else if ($is_info){
        //$template = "i_shagau_po_moskve_info.twig";
        $controller = new IShagauPoMoskveInfoController($twig);
    }
}
if ($controller){
    $controller->setPDO($pdo);
    $controller->get();
}