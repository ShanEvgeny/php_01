<?php
class ExitController extends BaseController{
    public function post(array $context){
        $_SESSION['is_logged'] = false;
        header("Location: /login");
        exit;
    }
}