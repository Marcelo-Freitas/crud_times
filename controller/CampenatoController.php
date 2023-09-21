<?php 
require __DIR__.'/../dao/CampeonatoDAO.php';

class CampeonatoController
{
    private CampoenatoDAO $campeonatoDAO;

    public function __construct() {
        $this->campeonatoDAO = new CampoenatoDAO();
    }

    public function listar() {
        return $this->campeonatoDAO->list();
    }
}