<?php


class conexao{
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
//voces devem escrever usuario
    private $banco = "usuarios";
    private $conn;

    public function getconnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=". $this->host.";dbname=". $this->banco, $this->usuario,$this->senha);
            $this->conn->setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOexception $e){
            echo "erro na conexao: ". $e->getMessage();
        }

        return $this->conn;

    }
}