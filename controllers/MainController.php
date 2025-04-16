<?php
require_once "TwigBaseController.php";
class MainController extends TwigBaseController{
    public $template = "main.twig";
    public $title = "Главная";
    public function getContext():array{
        $context = parent::getContext();
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
        return $context;
    }
}