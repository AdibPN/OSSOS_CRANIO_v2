<?php

namespace App\Controller;

use App\Model\OssoModel;

class OssoController extends Controller
{
    public static function index() 
    {
        $model = new OssoModel();
        $model->getAllRows();

        parent::render("Osso/ListaOsso", $model);
    }

    public static function form() 
    {
        $model = new OssoModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);
        

        parent::render("Osso/FormOsso", $model); 
    }

    public static function save() 
    {
        $Osso = new OssoModel();
        $Osso->id = $_POST['id'];
        $Osso->funcao = $_POST['funcao'];
        $Osso->nome = $_POST['nome'];
    

        $Osso->save();

        header("location: /Osso"); 
    }

    public static function delete()
    {
        $model = new OssoModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /Osso");
    
    }
}