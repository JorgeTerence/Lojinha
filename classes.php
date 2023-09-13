<?php
class Produto
{
    private $code;
    private $description;
    private $value;
    private $expire;
    private $order;
    private $expire_start;
    private $expire_end;
    private $image;
    private $image_path;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($cd)
    {
        $this->code = $cd;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($cd)
    {
        $this->description = $cd;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($val)
    {
        $this->value = $val;
    }

    public function getExpire()
    {
        return $this->expire;
    }

    public function setExpire($date)
    {
        $this->expire = $date;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }
    public function getExpireStart()
    {
        return $this->expire_start;
    }

    public function setExpireStart($expire_start)
    {
        $this->expire_start = $expire_start;
    }

    public function getExpireEnd()
    {
        return $this->expire_end;
    }

    public function setExpireEnd($expire_end)
    {
        $this->expire_end = $expire_end;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($img)
    {
        $this->image = $img;
    }

    public function getImagePath()
    {
        return $this->image_path;
    }

    public function setImagePath($path)
    {
        $this->image_path = $path;
    }

    public function insert()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("INSERT INTO product (id, descri, val, expire_date, image_name, image) VALUES (?,?,?,?,?,?)");
            $comando->bindParam(1, $this->code);
            $comando->bindParam(2, $this->description);
            $comando->bindParam(3, $this->value);
            $comando->bindParam(4, $this->expire);
            $comando->bindParam(5, $this->image);
            $comando->bindParam(6, file_get_contents($this->image_path));

            if ($comando->execute()) return "Produto inserido com sucesso";
        } catch (PDOException $erro) {
            return "Erro ao gravar os dados" . $erro->getMessage();
        }
    }

    public function delete()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare('DELETE FROM product WHERE id = ?');
            $comando->bindParam(1, $this->code);

            if ($comando->execute()) return "Produto deletado com sucesso";
        } catch (PDOException $erro) {
            return "Erro ao deletar os dados" . $erro->getMessage();
        }

        return $retorno;
    }

    public function consultarOrder($order)
    {
        include_once '../connection.php';

        try {
            if ($order == "id") {
                $comando = $conn->prepare("SELECT * FROM product ORDER BY id");
                $comando->execute();
                return $comando->fetchAll(PDO::FETCH_ASSOC);
            } else if ($order == "descri") {
                $comando = $conn->prepare("SELECT * FROM product ORDER BY descri");
                $comando->execute();
                return $comando->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $erro) {
            die("Erro ao deletar os dados" . $erro->getMessage());
        }
    }

    public function consultarDate($expire_start, $expire_end)
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("SELECT * FROM product WHERE expire_date BETWEEN ? AND ?;");
            $comando->bindParam(1, $expire_start);
            $comando->bindParam(2, $expire_end);
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            return "Erro ao deletar os dados" . $erro->getMessage();
        }
    }

    public function search()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("SELECT * FROM product WHERE id = ?");
            $comando->bindParam(1, $this->code);
            $comando->execute();
            return json_encode($comando->fetchAll(PDO::FETCH_ASSOC)[0]);
        } catch (PDOException $erro) {
            return "Erro ao deletar os dados" . $erro->getMessage();
        }
    }

    public function alter()
    {
        include_once '../connection.php';

        try {
            $comando = $conn->prepare("UPDATE product SET descri = ?, val = ?, expire_date = ? WHERE id = ?");
            $comando->bindParam(1, $this->description);
            $comando->bindParam(2, $this->value);
            $comando->bindParam(3, $this->expire);
            $comando->bindParam(4, $this->code);


            if ($comando->execute())
                return "Registro alterado. ";
        } catch (PDOException $erro) {
            return "Erro ao alterar os dados" . $erro->getMessage();
        }
    }
}
