<?php
class LoginRequiredMiddleware extends BaseMiddleware{
    public function apply(BaseController $controller, array $context){
        // $username = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
        // $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
        // $query = $controller->pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        // $query->bindValue("username", $username);
        // $query->bindValue("password", $password);
        // $query->execute();
        // if($query->rowCount() == 0) {
        //     header('WWW-Authenticate: Basic realm="Space objects"');
        //     http_response_code(401);
        //     exit;
        // }
        $is_logged = isset($_SESSION['is_logged']) ? $_SESSION['is_logged'] : false;
        //$_SESSION["middletvar"] = false;
        if (!$is_logged){
            header('Location: /login');
            exit;
        }
    }
}