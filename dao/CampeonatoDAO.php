<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Campeonato.php");

class CampoenatoDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM campeonatos";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    private function mapBancoParaObjeto($result) {
        $campeonato = array();
        foreach($result as $reg) {
            $c = new Campeonato();
            $c->setId($reg['id'])
                ->setNome($reg['nome'])
                ->setPremiacao($reg['premiacao']);
            array_push($campeonato, $c);
        }

        return $campeonato;
    }

}