<?php
require_once "IShagauPoMoskveController.php";
class IShagauPoMoskveInfoController extends IShagauPoMoskveController{
    public $template = "i_shagau_po_moskve_info.twig";
    public function getContext():array{
        $context = parent::getContext();
        $context['is_info'] = true;
        return $context;
    }
}