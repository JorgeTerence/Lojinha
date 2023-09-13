<?php

class User
{
    private $id;
    private $name;
    private $tel;
    private $cpf;
    private $cep;
    private $number;
    private $complement;

    private function __constructor__() {

    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCPF()
    {
        return $this->cpf;
    }

    public function getCEP()
    {
        return $this->cep;
    }

    public function setCEP($cep)
    {
        $this->cep = $cep;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    public function setComplement($complement)
    {
        $this->complement = $complement;
    }

    public function insert()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("INSERT INTO user (id, name, phone, cpf, cep, street_number, complement) VALUES (?,?,?,?,?,?,?)");
            $comando->bindParam(1, $this->id);
            $comando->bindParam(2, $this->name);
            $comando->bindParam(3, $this->tel);
            $comando->bindParam(4, $this->cpf);
            $comando->bindParam(5, $this->cep);
            $comando->bindParam(6, $this->number);
            $comando->bindParam(7, $this->complement);

            if ($comando->execute())
                return "Usuário registrado com sucesso. ";
        } catch (PDOException $erro) {
            return "Erro ao gravar os dados" . $erro->getMessage();
        }
    }

    public function delete()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare('DELETE FROM user WHERE id = ?');
            $comando2 = $conn->prepare('DELETE FROM purchase WHERE id_user = ?');
            $comando->bindParam(1, $this->id);

            if ($comando->execute()) {
                $retorno = "Produto deletado com sucesso";
            }
        } catch (PDOException $erro) {
            $retorno = "Erro ao deletar os dados" . $erro->getMessage();
        }

        return $retorno;
    }

    public function search()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("SELECT * FROM user WHERE id = ?");
            $comando->bindParam(1, $this->id);
            $comando->execute();
            return json_encode($comando->fetchAll(PDO::FETCH_ASSOC)[0]);
        } catch (PDOException $erro) {
            return "Erro ao deletar os dados" . $erro->getMessage();
        }
    }

    public function edit()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("UPDATE user SET name = ?, phone = ?, cpf = ?, cep = ?, street_number = ?, complement = ? WHERE id = ?");
            $comando->bindParam(1, $this->name);
            $comando->bindParam(2, $this->tel);
            $comando->bindParam(3, $this->cpf);
            $comando->bindParam(4, $this->cep);
            $comando->bindParam(5, $this->number);
            $comando->bindParam(6, $this->complement);
            $comando->bindParam(7, $this->id);

            if ($comando->execute())
                return "Registro alterado. ";
        } catch (PDOException $erro) {
            return "Erro ao alterar os dados" . $erro->getMessage();
        }
    }

    public function list()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("SELECT * FROM user");
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            return "Erro ao listar os dados" . $erro->getMessage();
        }
    }
}
