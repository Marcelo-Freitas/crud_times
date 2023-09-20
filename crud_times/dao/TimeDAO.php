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
        $stmt->execute([$time->getNome(), 
                        $time->getClassificacao(), 
                        $time->getAnoFundacacao(),
                        $time->getEstado()->getId(),
                        $time->getCampeonato()->getId()]);
    }

    public function deleteById(int $id) {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM times WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function list() {
        $sql = "SELECT a.*," . 
                " c.nome AS nome_curso, c.turno AS turno_curso" . 
                " FROM times a" .
                " JOIN cursos c ON (c.id = a.id_curso)" .
                " ORDER BY a.nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function findById(int $id) {
        $conn = Connection::getConnection();

        $sql = "SELECT a.*," . 
                " c.nome AS nome_curso, c.turno AS turno_curso" . 
                " FROM times a" .
                " JOIN cursos c ON (c.id = a.id_curso)" .
                " WHERE a.id = ?";

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
                ->setEstrangeiro($reg['estrangeiro'])
                ->setIdade($reg['idade']);

            $curso = new Curso();
            $curso->setId($reg['id_curso'])
                ->setNome($reg['nome_curso'])
                ->setTurno($reg['turno_curso']);            
            $time->setCurso($curso);

            array_push($times, $time);
        }

        return $times;
    }

}