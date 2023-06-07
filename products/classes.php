<?php
class Produto {
    private $code;
    private $description;
    private $value;
    private $expire;
    private $order;
    private $expire_start;
    private $expire_end;

    public function getCode() {
        return $this->code;
    }

    public function setCode($cd) {
        $this->code = $cd;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($cd) {
        $this->description = $cd;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($val) {
        $this->value = $val;
    }

    public function getExpire() {
        return $this->expire;
    }

    public function setExpire($date) {
        $this->expire = $date;
    }

    public function getOrder() {
        return $this->order;
    }

    public function setOrder($order) {
        $this->order = $order;
    }
    public function getExpireStart() {
        return $this->expire_start;
    }

    public function setExpireStart($expire_start) {
        $this->expire_start = $expire_start;
    }
    public function getExpireEnd() {
        return $this->expire_end;
    }

    public function setExpireEnd($expire_end) {
        $this->expire_end = $expire_end;
    }

    public function insert() {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("INSERT INTO produto (id, definicao, val, expire_date) VALUES (?,?,?,?)");
            $comando->bindParam(1, $this->code);
            $comando->bindParam(2, $this->description);
            $comando->bindParam(3, $this->value);
            $comando->bindParam(4, $this->expire);

            if ($comando->execute()) {
                $retorno= "Produto inserido com sucesso";
            }
        } catch (PDOException $erro) {
            $retorno = "Erro ao gravar os dados" . $erro->getMessage();
        }

        return $retorno;

    }

    public function delete() {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare('DELETE FROM produto WHERE id = ?');
            $comando->bindParam(1, $this->code);

            if ($comando->execute()) {
                $retorno= "Produto deletado com sucesso";
            }
        } catch (PDOException $erro) {
            $retorno = "Erro ao deletar os dados" . $erro->getMessage();
        }

        return $retorno;
    }

    public function consultarOrder(){
        include_once '../connection.php';

        try {
            if ($this-> order == "id") {
                $comando = $conn -> prepare("SELECT * FROM produto ORDER BY id"); 
                $comando->execute();
                return $comando->fetchAll(PDO::FETCH_ASSOC);
            } else if ($this-> order == "definicao") {
                $comando = $conn -> prepare("SELECT * FROM produto ORDER BY definicao"); 
                $comando->execute();
                return $comando->fetchAll(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $erro) {
            die("Erro ao deletar os dados" . $erro->getMessage());
        }
    }

    public function consultarDate() {
        include_once '../connection.php';

        try {
            $comando = $conn -> prepare("SELECT * FROM produto WHERE expire_date BETWEEN ? AND ?;"); 
            $comando->bindParam(1, $this->expire_start);
            $comando->bindParam(2, $this->expire_end);
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            return "Erro ao deletar os dados" . $erro->getMessage();
        }
    }
}
