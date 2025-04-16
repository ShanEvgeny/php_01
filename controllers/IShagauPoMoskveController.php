<?php
require_once "TwigBaseController.php";
class IShagauPoMoskveController extends TwigBaseController{
    public $template = "object.twig";
    public $title = "Я шагаю по Москве";
    public function getContext():array{
        $context = parent::getContext();
        $context['url_title'] = "i_shagau_po_moskve";
        return $context;
    }
}