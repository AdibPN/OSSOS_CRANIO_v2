<?php

namespace APP\Controller;

use APP\Model\LoginModel;

class LoginController extends Controller
{
    public static function index()
    {
        parent::render('Login/FormLogin');
    }

    public static function auth()
    {
        $model = new LoginModel();
        $model->email = $_POST['email'];
        $model->senha = $_POST['senha'];

        $usuario_logado = $model->autenticar();

        //var_dump($usuario_logado);
        //exit;

        if(is_object($usuario_logado)) {

            $_SESSION['usuario_logado'] = $usuario_logado;

            header("Location: /Membro/form");

        } else
            header("Location: /login?erro=true");

    }

    public static function logout()
    {
        unset($_SESSION['usuario_logado']);

        parent::isAuthenticated();
    }
}