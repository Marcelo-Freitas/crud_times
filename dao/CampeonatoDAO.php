<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Campeonato.php");

class CampoenatoDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list(int $id_estado) {
        $sql = "SELECT * FROM campeonatos WHERE id_estado = :id_estado";
        $stm = $this->conn->prepare($sql);
        $stm->bindParam(':id_estado', $id_estado, PDO::PARAM_INT);
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