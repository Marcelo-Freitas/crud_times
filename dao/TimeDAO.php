<?php 
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Time.php");
require_once(__DIR__ . "/../model/Campeonato.php");
require_once(__DIR__ . "/../model/Estado.php");


class TimeDAO {

    private $conn; 

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function insert(Time $time) {
        $sql = "INSERT INTO times" . 
                " (nome, classificacao, ano_fundacao, id_estado, id_campeonato)" .
                " VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$time->getNome(), 
                        $time->getClassificacao(), 
                        $time->getAnoFundacacao(),
                        $time->getEstado()->getId(),
                        $time->getCampeonato()->getId()]);
    }

    public function update(Time $time) {
        $conn = Connection::getConnection();

        $sql = "UPDATE times SET nome = ?, classificacao = ?,". 
            " ano_fundacao = ?, id_estado = ?, id_campeonato = ?".
            " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$time->getNome(), $time->getClassificacao(), 
                        $time->getAnoFundacacao(), $time->getEstado()->getId(),
                        $time->getCampeonato()->getId(), $time->getId()]);
    }

    public function deleteById(int $id) {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM times WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function list() {
        $sql = "SELECT t.*," . 
                " e.nome AS nome_estado, e.sigla AS sigla_estado," .
                " ca.nome AS nome_campeonato, ca.premiacao AS campeonato_premiacao" . 
                " FROM times t" .
                " JOIN estados e ON (e.id = t.id_estado)" .
                " JOIN campeonatos ca ON (ca.id = t.id_campeonato)" .
                " ORDER BY t.nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function findById(int $id) {
        $conn = Connection::getConnection();

        $sql = "SELECT t.*," . 
                " e.nome AS nome_estado, e.sigla AS sigla_estado," . 
                " ca.nome AS nome_campeonato, ca.premiacao AS campeonato_premiacao" . 
                " FROM times t" .
                " JOIN estados e ON (e.id = t.id_estado)" .
                " JOIN campeonatos ca ON (ca.id = t.id_campeonato)" .
                " WHERE t.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto time
        $times = $this->mapBancoParaObjeto($result);

        if(count($times) == 1)
            return $times[0];
        elseif(count($times) == 0)
            return null;

        die("timeDAO.findById - Erro: mais de um time".
                " encontrado para o ID " . $id);
    }

    //Converte do formato Banco (array associativo) para Objeto
    private function mapBancoParaObjeto($result) {
        $times = array();

        foreach($result as $reg) {
            $time = new Time();
            $time->setId($reg['id'])
                ->setNome($reg['nome'])
                ->setClassificacao($reg['classificacao'])
                ->setAnoFundacacao($reg['ano_fundacao']);

            $campeonato = new Campeonato();
            $campeonato->setId($reg['id_campeonato'])
                ->setNome($reg['nome_campeonato'])
                ->setPremiacao($reg['campeonato_premiacao']);            
            $time->setCampeonato($campeonato);

            $estado = new Estado();
            $estado->setId($reg['id_estado'])
                ->setNome($reg['nome_estado'])
                ->setSigla($reg['sigla_estado']);            
            $time->setEstado($estado);

            array_push($times, $time);
        }

        return $times;
    }

}