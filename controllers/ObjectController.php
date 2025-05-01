<?php
require_once "BaseCinemaTwigController.php";
class ObjectController extends BaseCinemaTwigController{
    public $template = "object.twig";
    public function getContext():array{
        $context = parent::getContext();
        // $query = $this->pdo->query("SELECT description, id FROM cinema_objects WHERE id=".$this->params['id']);
        $query = $this->pdo->prepare("SELECT description, id FROM cinema_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context["id"] = $data["id"];
        $context["description"] = $data["description"];
        if (isset($_GET['show']) && $_GET['show'] == 'info'){
            $query = $this->pdo->prepare("SELECT info FROM cinema_objects WHERE id= :my_id");
            $query->bindValue("my_id", $this->params['id']);
            $query->execute();
            $data = $query->fetch();
            $context['is_info'] = true;
            $context["info"] = $data["info"];
        }
        else if (isset($_GET['show']) && $_GET['show'] == 'image'){
            $query = $this->pdo->prepare("SELECT image FROM cinema_objects WHERE id= :my_id");
            $query->bindValue("my_id", $this->params['id']);
            $query->execute();
            $data = $query->fetch();
            $context['is_image'] = true;
            $context["image"] = $data["image"];
        }
        return $context;
    }
}