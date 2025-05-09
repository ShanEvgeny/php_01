<?php
require_once "BaseCinemaTwigController.php";
class CinemaObjectUpdateController extends BaseCinemaTwigController{
    public $template = "cinema_object_create.twig";
    public function get(array $context){
        $id = $this->params['id'];
        $sql = <<<EOL
SELECT * FROM cinema_objects WHERE id = :id
EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue('id', $id);
        $query->execute();
        $data = $query->fetch();
        $context['object'] = $data;
        $context["is_update"] = true;
        parent::get($context);
    }
    public function post(array $context){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type_id = $_POST['type'];
        $info = $_POST['info'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        move_uploaded_file($tmp_name,"../public/media/$name");
        $image_url = "/media/$name";
        $sql = <<<EOL
UPDATE cinema_objects SET title = :title, description = :description, type_id = :type, info = :info, image = :image_url
WHERE id = :id
EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type_id);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);
        $query->bindValue("id", $this->params['id']);
        $query->execute();
        $context["message"] = "Вы успешно изменили объект";
        $context["id"] = $this->params['id'];
        $this->get($context);
    }
}