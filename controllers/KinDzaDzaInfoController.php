<?php
require_once "KinDzaDzaController.php";
class KinDzaDzaInfoController extends KinDzaDzaController{
    public $template = "kin-dza-dza_info.twig";
    public function getContext():array{
        $context = parent::getContext();
        $context['is_info'] = true;
        return $context;
    }
}