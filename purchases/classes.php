<?php
    class Order{
        private $cod;
        private $cod_prod;
        private $qtd;
        private $dt;
        private $pag;

        public function getCod(){
             return $this-> cod;
        }
        public function setCod($cd){
            $this-> cod = $cd;
        }
        public function getCodProd(){
             return $this-> cod_prod;
        }
        public function setCodProd($cd){
            $this-> cod_prod = $cd;
        }
        public function getQtd(){
             return $this-> qtd;
        }
        public function setQtd($qtd){
             $this-> qtd = $qtd;
        }
        public function getData(){
             return $this-> dt;
        }
        public function setData($dt){
             $this->dt = $dt;
        }
        public function getPag(){
             return $this-> pag;
        }
        public function setPag($pag){
              $this-> pag = $pag;
        }



        public function insert() {
            include_once '../connection.php';
    
            try {
                $comando = $conn->prepare("INSERT INTO purchase (cod, cod_prod, qtd, dt, pag) VALUES (?,?,?,?,?)");
                $comando->bindParam(1, $this->cod);
                $comando->bindParam(2, $this->cod_prod);
                $comando->bindParam(3, $this->qtd);
                $comando->bindParam(4, $this->dt);
                $comando->bindParam(5, $this->pag);
    
                if ($comando->execute()) {
                    $retorno= "Compra realizada com sucesso. ";
                }
            } catch (PDOException $erro) {
                $retorno = "Erro ao gravar os dados" . $erro->getMessage();
            }
            return $retorno;
    
        }
    
        public function delete() {
            include_once '../connection.php';
    
            try {
                $comando = $conn->prepare('DELETE FROM purchase WHERE cod = ?');
                $comando->bindParam(1, $this->cod);
    
                if ($comando->execute()) {
                    $retorno= "Produto deletado com sucesso";
                }
            } catch (PDOException $erro) {
                $retorno = "Erro ao deletar os dados" . $erro->getMessage();
            }
    
            return $retorno;
        }

        public function listPagto() {
            include_once '../connection.php';

            try {
                $comando = $conn -> prepare("SELECT cod, cod_prod, qtd, dt, pag, descri FROM purchase INNER JOIN produto ON purchase.cod_prod=produto.id");
                $comando->execute();
                return $comando->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $erro) {
                return "Erro ao deletar os dados" . $erro->getMessage();
            }
        }

        public function listTudo() {
            include_once '../connection.php';

            try {
                $comando = $conn -> prepare("SELECT cod, cod_prod, qtd, dt, pag, descri, name FROM purchase INNER JOIN produto ON purchase.cod_prod=produto.id INNER JOIN user ON purchase.id_user=user.id");
                $comando->execute();
                return $comando->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $erro) {
                die("Erro ao listar dados" . $erro->getMessage());
            }
        }
    }
?>