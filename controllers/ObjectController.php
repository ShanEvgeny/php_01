<?php
class ObjectController extends TwigBaseController{
    public $template = "object.twig";
    public function getContext():array{
        $context = parent::getContext();
        // $query = $this->pdo->query("SELECT description, id FROM cinema_objects WHERE id=".$this->params['id']);
        $query = $this->pdo->prepare("SELECT description, id FROM cinema_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context["description"] = $data["description"];
        return $context;
    }
}