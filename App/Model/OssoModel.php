<?php

namespace App\Model;

use App\DAO\OssoDAO;

class OssoModel extends Model
{
    public $id, $funcao, $nome;

    public function save() 
    {
        $dao = new OssoDAO(); 

        if(empty($this->id))
        {
            // Chamando o método insert que recebe o próprio objeto model
            // já preenchido
            $dao->insert($this);

        }else {
            $dao->update($this); // Como existe um id, passando o model para ser atualizado.
        }  
    }


    /**
     * Método que encapsula a chamada a DAO e que abastecerá a propriedade rows;
     * Esse método é importante pois como a model é "vista" na View a propriedade
     * $rows será acessada e possibilitará listar os registros vindos do banco de dados
     */
    public function getAllRows()
    {
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new OssoDao();

        // Abastecimento da propriedade $rows com as "linhas" vindas do MySQL
        // via camada DAO.
        $this->rows = $dao->select();
    }

    public function GetById(int $id)
    {
        // Instância do objeto e conexão no banco de dados via construtor
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
