<?php

namespace App\DAO;

use App\Model\MembroModel;
use \PDO;

class MembroDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(MembroModel $model)
    {
        $sql = "INSERT INTO Membro (nome, partes) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->partes);

        $stmt->execute();
    }

    public function update(MembroModel $model)
    {
        $sql = "UPDATE Membro SET nome=?, partes=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->partes);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM Membro ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function selectById(int $id)
    {
        include_once 'model/MembroModel.php';

        $sql = "SELECT * FROM Membro WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("\App\Model\MembroModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM Membro WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}