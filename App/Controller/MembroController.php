<?php

namespace APP\Controller;

use APP\Model\MembroModel;

class MembroController extends Controller
{
   
    public static function index() 
    {        
        parent::isAuthenticated();
        
        $model = new MembroModel();
        $model->getAllRows();

        parent::render("Membro/ListaMembro", $model);
    }

   
    public static function form()
    {
        parent::isAuthenticated();
        
        $model = new MembroModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']);

        parent::render("Membro/FormMembro", $model);
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


    public static function delete()
    {
        parent::isAuthenticated();
        
        $model = new MembroModel();

        $model->delete( (int) $_GET['id'] ); 
        
        header("Location: /Membro"); 
    }

}