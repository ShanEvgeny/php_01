<?php
class BaseCinemaTwigController extends TwigBaseController{
    public function getContext():array{
        $context = parent::getContext();
        $query = $this->pdo->query(
            "SELECT type_name, id FROM object_types ORDER BY id");
        $types = $query->fetchAll();
        $context['types'] = $types;

        return $context;
    }
}