<?php

namespace App\Controller;

use App\Model\MembroModel;

class MembroController extends Controller
{
   
    public static function index() 
    {
        $model = new MembroModel();
        $model->getAllRows();

        parent::render("Membro/ListaMembro", $model);
    }

   
    public static function form()
    {
        $model = new MembroModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']);

        parent::render("Membro/FormMembro", $model);
    }

   
    public static function save() {
        $Membro = new MembroModel();
        $Membro->id = $_POST['id'];
        $Membro->nome = $_POST['nome'];
        $Membro->partes = $_POST['partes'];

        $Membro->save();
        header("Location: /Membro"); 
    }


    public static function delete()
    {
        $model = new MembroModel();

        $model->delete( (int) $_GET['id'] ); 
        
        header("Location: /Membro"); 
    }

}