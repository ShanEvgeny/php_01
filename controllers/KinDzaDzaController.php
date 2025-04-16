<?php
require_once "TwigBaseController.php";
class KinDzaDzaController extends TwigBaseController{
    public $template = "object.twig";
    public $title = "Кин-дза-дза";
    public function getContext():array{
        $context = parent::getContext();
        $context['url_title'] = "kin-dza-dza";
        return $context;
    }
}