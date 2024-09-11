<?php
require 'conexao.class.php';
class Contatos
{
    private $id;
    private $nome;
    private $endereço;
    private $dt_nasc;
    private $descricao;
    private $linkedin;
    private $email;
    private $foto;

    private $con;

    public function __construct()
    {
        // Método construtor é o primeiro método a ser executado
        $this->con = new Conexao();
    }
    private function existeEmail($email)
    {
        $sql = $this->con->conectar()->prepare("SELECT id FROM contatos WHERE email = :email");
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(); //fetch retorna o email encontrado
        } else {
            $array = array();
        }
        return $array;
    }
    public function adicionar($email, $nome, $telefone, $endereco, $dt_nasc, $descricao, $linkedin, $foto)
    {
        $emailExistente = $this->existeEmail($email);
        if (count($emailExistente) == 0) {
            try {
                $this->nome = $nome;
                $this->telefone = $telefone;
                $this->endereco = $endereco;
                $this->dt_nasc = $dt_nasc;
                $this->descricao = $descricao;
                $this->linkedin = $linkedin;
                $this->foto = $foto;
                $this->email = $email;
                $sql = $this->con->conectar()->prepare("INSERT INTO contatos(nome, telefone, endereco, dt_nasc, descricao, linkedin, foto, email) VALUES 
                (:nome, :telefone, :endereco, :dt_nasc, :descricao, :linkedin, :email, :foto)");

                $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
                $sql->bindParam(':telefone', $telefone, PDO::PARAM_STR);
                $sql->bindParam(':endereco', $endereco, PDO::PARAM_STR);
                $sql->bindParam(':dt_nasc', $dt_nasc, PDO::PARAM_STR);
                $sql->bindParam(':descricao', $descricao, PDO::PARAM_STR);
                $sql->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
                $sql->bindParam(':email', $email, PDO::PARAM_STR);
                $sql->bindParam(':foto', $foto, PDO::PARAM_STR);
                $sql->execute();
                return TRUE;

            } catch (PDOException $ex) {
                return 'ERRO: ' . $ex->getMessage();
            }
        } else {
            return FALSE;
        }
    }
    public function listar()
    {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM contatos");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            echo "ERRO: " . $ex->getMessage();
        }
    }
    public function buscar($id)
    {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM contatos WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            } else {
                return array();
            }
        } catch (PDOException $ex) {
            echo "ERRO: " . $ex->getMessage();
        }
    }

    public function atualizar($id, $nome, $telefone, $endereco, $dt_nasc, $descricao, $linkedin, $email, $foto)
    {
        try {
            $sql = $this->con->conectar()->prepare("UPDATE contatos SET 
            nome = :nome, 
            telefone = :telefone, 
            endereco = :endereco, 
            dt_nasc = :dt_nasc, 
            descricao = :descricao, 
            linkedin = :linkedin, 
            email = :email, 
            foto = :foto 
            WHERE id = :id");

            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
            $sql->bindParam(':telefone', $telefone, PDO::PARAM_STR);
            $sql->bindParam(':endereco', $endereco, PDO::PARAM_STR);
            $sql->bindParam(':dt_nasc', $dt_nasc, PDO::PARAM_STR);
            $sql->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $sql->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
            $sql->bindParam(':email', $email, PDO::PARAM_STR);
            $sql->bindParam(':foto', $foto, PDO::PARAM_STR);

            $sql->execute();
            return true;
        } catch (PDOException $ex) {
            return 'ERRO: ' . $ex->getMessage();
        }
    }
}