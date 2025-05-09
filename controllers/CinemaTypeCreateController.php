<?php
require_once "BaseCinemaTwigController.php";
class CinemaTypetCreateController extends BaseCinemaTwigController{
    public $template = "cinema_type_create.twig";
    public function get(array $context){
        // echo $_SERVER["REQUEST_METHOD"];
        parent::get($context);
    }
    public function post(array $context){
        $type_name = $_POST['type_name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        move_uploaded_file($tmp_name,"../public/media/$name");
        $image_url = "/media/$name";
        $sql = <<<EOL
INSERT INTO object_types(type_name, image)
VALUES(:type_name, :image_url)
EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue("type_name", $type_name);
        $query->bindValue("image_url", $image_url);
        $query->execute();
        $context["message"] = "Вы успешно создали тип";
        $this->get($context);
    }
}