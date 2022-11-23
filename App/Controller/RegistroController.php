<?php

namespace APP\Controller;

use APP\Model\RegistroModel;
use FFI\Exception;

class RegistroController extends Controller
{
    public static function form()
    {
        parent::render('Registro/FormRegistro');
    }

    public static function save()
    {
        try {
            $model = new RegistroModel();

            $model->nome = $_POST['nome'];
            $model->email = $_POST['email'];
            $model->senha = $_POST['senha'];


            $contas = $model->getAccountByEmail();

            if ($contas) {
                header("Location: /register?erro=true");
            } else {
                $model->save();
                header("Location: /login/form");
            }
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
}
