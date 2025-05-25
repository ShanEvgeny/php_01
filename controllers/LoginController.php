<?php
//require_once "BaseCinemaTwigController.php";
class LoginController extends TwigBaseController{
    public $template = "login.twig";
    public $title = "Авторизация";
    public function get(array $context){
        parent::get($context);
    }
    public function post(array $context){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $query->bindValue("username", $username);
        $query->bindValue("password", $password);
        $query->execute();
        if($query->rowCount() > 0) {
            $_SESSION["is_logged"] = true;
            header("Location: /");
            exit;
        }
        $this->get($context);
    }

}