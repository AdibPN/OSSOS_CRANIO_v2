<?php

namespace APP\Controller;

use APP\Model\MembroModel;
use FFI\Exception;

class MembroController extends Controller
{
    public static function form()
    {
        parent::isAuthenticated();
        
        $model = new MembroModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']);

        parent::render("Membro/Form", $model);
    }

   
    public static function index() 
    {        
        parent::isAuthenticated();
        
        $model = new MembroModel();
        $model->getAllRows();

        parent::render("Membro/ListaMembro", $model);
    }
   
    public static function save() 
    {
        parent::isAuthenticated();

        $Membro = new MembroModel();
        $Membro->id = $_POST['id'];
        $Membro->nome = $_POST['nome'];
        $Membro->partes = $_POST['partes'];

        ##olhar se realmente é $Membro ou $Model

        $Membro->save();
        header("Location: /Membro"); 
    }


    public static function delete(){        
        
        $model = new MembroModel();    

        if(isset($_GET['id'])){
            $model->delete($_GET['id']);
            header("Location: /home");
        }            
        else
            echo '<script>alert(Erro ao deletar a notícia.)</script>';
    }

 

}