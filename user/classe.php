<?php

class User
{
    private $id;
    private $name;
    private $tel;
    private $cpf;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }

    public function getCPF() {
        return $this->cpf;
    }

    public function insert() {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("INSERT INTO user (id, name, phone, cpf) VALUES (?,?,?,?)");
            $comando->bindParam(1, $this->id);
            $comando->bindParam(2, $this->name);
            $comando->bindParam(3, $this->tel);
            $comando->bindParam(4, $this->cpf);

            if ($comando->execute()) {
                return "Usuário registrado com sucesso. ";
            }
        } catch (PDOException $erro) {
            return "Erro ao gravar os dados" . $erro->getMessage();
        }
    }

    public function delete() {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare('DELETE FROM user WHERE id = ?');
            $comando->bindParam(1, $this->id);

            if ($comando->execute()) {
                $retorno = "Produto deletado com sucesso";
            }
        } catch (PDOException $erro) {
            $retorno = "Erro ao deletar os dados" . $erro->getMessage();
        }

        return $retorno;
    }

    public function consultar() {
        include_once '../connection.php';

        try {
            $comando = $conn -> prepare("SELECT * FROM user");
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            return "Erro ao deletar os dados" . $erro->getMessage();
        }
    }
}
