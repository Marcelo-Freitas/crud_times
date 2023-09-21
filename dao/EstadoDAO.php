<?php
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Estado.php");

class EstadoDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM estados";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    private function mapBancoParaObjeto($result) {
        $estado = array();
        foreach($result as $reg) {
            $c = new Estado();
            $c->setId($reg['id'])
                ->setNome($reg['nome'])
                ->setSigla($reg['sigla']);
            array_push($estado, $c);
        }

        return $estado;
    }

}