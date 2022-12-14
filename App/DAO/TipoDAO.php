<?php

namespace APP\DAO;

use APP\Model\TipoModel;
use \PDO;

class TipoDAO extends DAO {
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(TipoModel $model)
    {
        $sql = "INSERT INTO Tipo 
                (nome)
                VALUES
                (?) ";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->execute();

    }

    public function update(TipoModel $model)
    {
        $sql = "UPDATE Tipo SET nome=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM Tipo ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


   
    public function selectById(int $id)
    {
       //include_once 'model/TipoModel.php';

        $sql = "SELECT * FROM Tipo WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("\App\Model\TipoModel"); 
    }


  
    public function delete(int $id)
    {
        $sql = "DELETE FROM Tipo WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}