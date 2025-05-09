<?php
require_once "BaseCinemaTwigController.php";
class SearchController extends BaseCinemaTwigController{
    public $template = "search.twig";
    public function getContext():array{
        $context = parent::getContext();
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $info = isset($_GET['info']) ? $_GET['info'] : '';
        $sql = <<<EOL
SELECT co.id, title, info 
FROM cinema_objects AS co
JOIN object_types AS ot ON ot.id = co.type_id
WHERE (title like CONCAT('%', :title, '%')) AND (info like CONCAT('%', :info, '%')) AND (type_name = :type)
EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue('title', $title);
        $query->bindValue('type', $type);
        $query->bindValue('info', $info);
        $query->execute();
        $context['objects'] = $query->fetchAll();
        return $context;
    }
}