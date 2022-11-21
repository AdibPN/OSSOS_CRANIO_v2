<?php

namespace APP\Model;


use APP\DAO\MembroDAO;  
use FFI\Exception;

class MembroModel extends Model
{
    public $id, $nome, $partes;

    public function save() {
        $dao = new MembroDAO(); 

        
        if(empty($this->id))
        {
            // Chamando o método insert que recebe o próprio objeto model
           
            $dao->insert($this);
        } else {
            $dao->update($this); 
        }          
    }

 

    public function getAllRows()
    {
        
        $dao = new MembroDAO();

       
        $this->rows = $dao->select();
    }

    
    public function getById(int $id)
    {
        $dao = new MembroDAO();

        $obj = $dao->selectById($id); 

        
        return ($obj) ? $obj : new MembroModel(); 
    }

  
    public function delete(int $id)
    {
        $dao = new MembroDAO();

        $dao->delete($id);
    }
}