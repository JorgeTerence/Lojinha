<?php
class Order
{
    private $cod;
    private $cod_prod;
    private $qtd;
    private $dt;
    private $pag;
    private $id_user;

    public function getCod()
    {
        return $this->cod;
    }
    public function setCod($cd)
    {
        $this->cod = $cd;
    }
    public function getCodProd()
    {
        return $this->cod_prod;
    }
    public function setCodProd($cd)
    {
        $this->cod_prod = $cd;
    }
    public function getQtd()
    {
        return $this->qtd;
    }
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;
    }
    public function getData()
    {
        return $this->dt;
    }
    public function setData($dt)
    {
        $this->dt = $dt;
    }
    public function getPag()
    {
        return $this->pag;
    }
    public function setPag($pag)
    {
        $this->pag = $pag;
    }
    public function getIdUser()
    {
        return $this->id_user;
    }
    public function setIdUser($id)
    {
        $this->id_user = $id;
    }



    public function insert()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("INSERT INTO purchase (cod, cod_prod, qtd, dt, pag, id_user) VALUES (?,?,?,?,?,?)");
            $comando->bindParam(1, $this->cod);
            $comando->bindParam(2, $this->cod_prod);
            $comando->bindParam(3, $this->qtd);
            $comando->bindParam(4, $this->dt);
            $comando->bindParam(5, $this->pag);
            $comando->bindParam(6, $this->id_user);

            if ($comando->execute()) {
                $retorno = "Compra realizada com sucesso. ";
            }
        } catch (PDOException $erro) {
            $retorno = "Erro ao gravar os dados" . $erro->getMessage();
        }
        return $retorno;
    }

    public function delete()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare('DELETE FROM purchase WHERE cod = ?');
            $comando->bindParam(1, $this->cod);

            if ($comando->execute()) {
                return "Venda deletada com sucesso";
            }
        } catch (PDOException $erro) {
            return "Erro ao deletar os dados" . $erro->getMessage();
        }
    }

    public function search()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("SELECT * FROM purchase WHERE cod = ?");
            $comando->bindParam(1, $this->cod);
            $comando->execute();
            return json_encode($comando->fetchAll(PDO::FETCH_ASSOC)[0]);
        } catch (PDOException $erro) {
            return "Erro ao pesquisar dados" . $erro->getMessage();
        }
    }

    public function edit()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("UPDATE purchase SET cod = ?, cod_prod = ?, qtd = ?, dt = ?, pag = ?, id_user = ? WHERE cod = ?");
            $comando->bindParam(1, $this->cod);
            $comando->bindParam(2, $this->cod_prod);
            $comando->bindParam(3, $this->qtd);
            $comando->bindParam(4, $this->dt);
            $comando->bindParam(5, $this->pag);
            $comando->bindParam(6, $this->id_user);
            $comando->bindParam(7, $this->cod);

            if ($comando->execute())
                return "Registro alterado.";
        } catch (PDOException $erro) {
            return "Erro ao alterar os dados" . $erro->getMessage();
        }
    }

    public function listPagto($pagto)
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("SELECT * FROM purchase INNER JOIN product ON purchase.cod_prod=product.id WHERE pag = ?");
            $comando->bindParam(1, $pagto);
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            return "Erro ao listar os dados" . $erro->getMessage();
        }
    }

    public function list()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("SELECT * FROM purchase LEFT JOIN product ON purchase.cod_prod=product.id");
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            return "Erro ao listar os dados" . $erro->getMessage();
        }
    }

    public function getUsername()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("SELECT * FROM user WHERE id = ?");
            $comando->bindParam(1, $this->id_user);
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC)[0]["name"];
        } catch (PDOException $erro) {
            return "Erro ao listar os dados" . $erro->getMessage();
        }
    }

    public function getDescription(){
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("SELECT * FROM product WHERE id = ?");
            $comando->bindParam(1, $this->cod_prod);
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC)[0]["descri"];
        } catch (PDOException $erro) {
            return "Erro ao listar os dados" . $erro->getMessage();
        }
    }
}
