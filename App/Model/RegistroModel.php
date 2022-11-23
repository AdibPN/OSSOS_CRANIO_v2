<?php

namespace APP\Model;

use APP\DAO\RegistroDAO;
use FFI\Exception;

class RegistroModel extends Model
{
    public $id, $nome, $email, $senha;
    public $rows = array();


    public function save()
    {
        $dao = new RegistroDAO();
        
        $dao->insert($this);
    }

    public function getAccountByEmail()
    {
        $dao = new RegistroDAO();

        return $dao->selectByEmail($this->email);
    }
}
