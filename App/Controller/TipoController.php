<?php

namespace App\Controller;

use App\Model\TipoModel;

class TipoController extends Controller
{
   
    public static function index() 
    {
        $model = new TipoModel();
        $model->getAllRows();

        parent::render("Tipo/ListaTipo", $model);
    }

    
    public static function form()
    {
        $model = new TipoModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']); 

        parent::render("Tipo/FormTipo", $model);
    }

  
    public static function save() {
        
        $Tipo = new TipoModel();
        $Tipo->id = $_POST['id'];
        $Tipo->nome = $_POST['nome'];


        $Tipo->save();

        header("Location: /Tipo"); 
    }


    public static function delete()
    {
        $model = new TipoModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /Tipo"); 
    }

}