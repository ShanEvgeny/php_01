<?php
require_once "BaseCinemaTwigController.php";
class MainController extends BaseCinemaTwigController{
    public $template = "main.twig";
    public $title = "Главная";
    public function getContext():array{
        $context = parent::getContext();
        if (isset($_GET['type'])){
            $query = $this->pdo->prepare("SELECT * FROM cinema_objects WHERE type = :type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
        }
        else {
            $query = $this->pdo->query("SELECT * FROM cinema_objects");
        }
        $context['cinema_objects'] = $query->fetchAll();
        return $context;
    }
}