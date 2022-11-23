<?php

namespace APP\DAO;

use APP\Model\RegistroModel;
use FFI\Exception;

class RegistroDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();

    }

    public function insert(RegistroModel $model){
        try{
            $sql = 'INSERT INTO usuario(nome, email, senha) VALUES (?, ?, sha1(?))';

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $model->email);
            $stmt->bindValue(3, $model->senha);

            $stmt->execute();

        }catch(Exception $e){
            echo 'Não foi possível cadastrar o usuario, erro: ' . $e->getMessage();
        }        
    }

    public function selectByEmailAndSenha($email, $senha)
    {
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject("APP\Model\RegistroModel"); 
    }

    public function selectByEmail($email)
    {
        $sql = "SELECT * FROM usuario WHERE email = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        return $stmt->fetchObject("APP\Model\RegistroModel"); 
    }
}