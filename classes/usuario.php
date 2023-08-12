<?php

include('conexao/conexao.php');

$db = new conexao();

class usuario{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function cadastrar($nome, $email, $senha, $confsenha)
    {
        if($senha === $confsenha){

            $emailexistente = $this->verificarEmailExistente($email);
            if($emailexistente){
                print "<script> alert(' Email ja cadastrado')</script>";
                return false;
            }

        $senhacriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome_usuario, email, senha) VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1,$nome);
        $stmt->bindValue(2,$email);
        $stmt->bindValue(3,$senhacriptografada);
        $result = $stmt->execute();

        return $result;
        
        
        }
    }
    private function verificarEmailExistente($email){
        $sql = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$email);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }


    public function logar($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->execute();

        if($stmt->rowCount() == 1){
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            IF(PASSWORD_verify($senha, $usuario['senha'])){
                return true;
            }
        }
        return false;
    }
}

?>