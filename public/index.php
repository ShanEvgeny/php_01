<?php
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);
$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$context = [];
if ($url == "/"){
    $template = "main.twig";
    $title = "Главная";
    $context['menu_items'] = [
        [
            "title" => "Кин-дза-дза",
            "url_title" => "kin-dza-dza"
        ],
        [
            "title" => "Я шагаю по Москве",
            "url_title" => "i_shagau_po_moskve"
        ]
    ];
}
else if ($url == "/kin-dza-dza" || $url == "/kin-dza-dza/info" || $url == "/kin-dza-dza/image"){
    $template = "object.twig";
    $title = "Кин-дза-дза";
    $is_info = $url == "/kin-dza-dza/info";
    $is_image = $url == "/kin-dza-dza/image";
    $context['url_title'] = "kin-dza-dza";
    $context['is_info'] = $is_info;
    $context['is_image'] = $is_image;
    if ($is_image){
        $template = "object_image.twig";
        $context['image_url'] = "https://avatars.mds.yandex.net/get-kinopoisk-image/1600647/7a580ffc-2d0e-49dd-bdbf-7fa91b72286e/orig";
    }
    else if ($is_info){
        $template = "kin-dza-dza_info.twig";
    }
}    
else if ($url == "/i_shagau_po_moskve" || $url == "/i_shagau_po_moskve/info" || $url == "/i_shagau_po_moskve/image"){
    $template = "object.twig";
    $title = "Я шагаю по Москве";
    $is_info = $url == "/i_shagau_po_moskve/info";
    $is_image = $url == "/i_shagau_po_moskve/image";
    $context['url_title'] = "i_shagau_po_moskve";
    $context['is_info'] = $is_info;
    $context['is_image'] = $is_image;
    if ($is_image){
        $template = "object_image.twig";
        $context['image_url'] = "https://avatars.mds.yandex.net/get-kinopoisk-image/1773646/e1209f59-1703-45d3-82ca-42266302587f/orig";
    }
    else if ($is_info){
        $template = "i_shagau_po_moskve_info.twig";
    }
}
$context['title'] = $title;
echo $twig->render($template, $context);