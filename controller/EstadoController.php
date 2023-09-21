<?php

require __DIR__.'/../dao/EstadoDAO.php';

class EstadoController {

    private EstadoDAO $estadoDAO;

    public function __construct() {
        $this->estadoDAO = new EstadoDAO();
    }

    public function listar() {
        return $this->estadoDAO->list();
    }

}