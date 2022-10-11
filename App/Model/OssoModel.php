<?php

namespace APP\Model;

use APP\DAO\OssoDAO;

class OssoModel extends Model
{
    public $id, $funcao, $nome;

    public function save() 
    {
        $dao = new OssoDAO(); 

        if(empty($this->id))
        {
           
            $dao->insert($this);

        }else {
            $dao->update($this); 
        }  
    }



    public function getAllRows()
    {
       
        $dao = new OssoDao();


        $this->rows = $dao->select();
    }

    public function GetById(int $id)
    {
        
        $dao = new OssoDao();

        $obj = $dao->selectById($id);

        return($obj) ? $obj : new OssoModel;
    }

    public function delete(int $id)
    {
        $dao = new OssoDao();

        $dao->delete($id);
    }

}
