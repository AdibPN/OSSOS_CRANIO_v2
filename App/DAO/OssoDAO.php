<?php

namespace APP\DAO;

use APP\Model\OssoModel;
use \PDO;

class OssoDAO extends DAO {
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(OssoModel $model)
    {
        $sql = "INSERT INTO Osso
                (funcao, nome)
                VALUES
                (?, ?) ";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->funcao);
        $stmt->bindValue(2, $model->nome);
        $stmt->execute();

    }

    public function update(OssoModel $model){
        $sql = "UPDATE Osso SET funcao=?, nome=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->funcao);
        $stmt->bindValue(2, $model->nome);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM Osso ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


  
    public function selectById(int $id)
    {
        //include_once 'model/OssoModel.php';

        $sql = "SELECT * FROM Osso WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("\App\Model\OssoModel"); 
    }


   
    public function delete(int $id)
    {
        $sql = "DELETE FROM Osso WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}