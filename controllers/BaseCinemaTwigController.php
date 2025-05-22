<?php
class BaseCinemaTwigController extends TwigBaseController{
    public function getContext():array{
        $context = parent::getContext();
        $query = $this->pdo->query(
            "SELECT type_name, id FROM object_types ORDER BY id");
        $types = $query->fetchAll();
        $context['types'] = $types;

        $url = $_SERVER['REQUEST_URI'];
        if (!isset($_SESSION['page_list'])){
            $_SESSION['page_list'] = [];
        }
        else if(sizeof($_SESSION['page_list']) == 10){
            array_splice($_SESSION['page_list'], 9, 1);
        }
        array_unshift($_SESSION['page_list'], urldecode($url));
        $context['page_list'] = isset($_SESSION['page_list']) ? $_SESSION['page_list'] : "";

        return $context;
    }
}