<?php
require_once "IShagauPoMoskveController.php";
class IShagauPoMoskveImageController extends IShagauPoMoskveController{
    public $template = "object_image.twig";
    public function getContext():array{
        $context = parent::getContext();
        $context['image_url'] = "https://avatars.mds.yandex.net/get-kinopoisk-image/1773646/e1209f59-1703-45d3-82ca-42266302587f/orig";
        return $context;
    }
}