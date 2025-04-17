<?php
require_once "KinDzaDzaController.php";
class KinDzaDzaImageController extends KinDzaDzaController{
    public $template = "object_image.twig";
    public function getContext():array{
        $context = parent::getContext();
        $context['image_url'] = "https://avatars.mds.yandex.net/get-kinopoisk-image/1600647/7a580ffc-2d0e-49dd-bdbf-7fa91b72286e/orig";
        $context['is_image'] = true;
        return $context;
    }
}