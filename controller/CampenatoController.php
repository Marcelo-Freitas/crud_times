<?php 
require_once __DIR__.'/../dao/CampeonatoDAO.php';

class CampeonatoController
{
    private CampoenatoDAO $campeonatoDAO;

    public function __construct() {
        $this->campeonatoDAO = new CampoenatoDAO();
    }

    public function listar(int $id_estado) {
        return $this->campeonatoDAO->list($id_estado);
    }
}