<?php

require __DIR__.'/../dao/TimeDAO.php';
require __DIR__.'/../model/Time.php';
require __DIR__.'/../service/TimeService.php';

class TimeController
{
    private $timeDAO;
    private $timeService;

    public function __construct() {
        $this->timeDAO = new TimeDAO;        
        $this->timeService = new TimeService;
    }

    public function listar() {
        return $this->timeDAO->list();        
    }

    public function buscarPorId(int $id) {
        return $this->timeDAO->findById($id);
    }

    public function inserir(Time $time) {
        $erros = $this->timeService->validarDados($time);
        if($erros) 
            return $erros;

        //Persiste o objeto e retorna um array vazio
        $this->timeDAO->insert($time);
        return array();
    }

    public function atualizar(Time $time) {
        $erros = $this->timeService->validarDados($time);
        if($erros) 
            return $erros;
        
        //Persiste o objeto e retorna um array vazio
        $this->timeDAO->update($time);
        return array();
    }

    public function excluirPorId(int $id) {
        $this->timeDAO->deleteById($id);
    }
}