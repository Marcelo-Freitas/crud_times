<?php

require __DIR__.'/../model/Time.php';

class TimeService
{
    public function validarDados(Time $time) {
        $erros = array();
        
        if(! $time->getNome()) {
            array_push($erros, "Informe o nome!");
        }

        if(! $time->getClassificacao()) {
            array_push($erros, "Informe a classificação!");
        }

        if(! $time->getAnoFundacacao()) {
            array_push($erros, "Informe o ano de fundação!");
        }

        if(! $time->getEstado()) {
            array_push($erros, "Informe o estado!");
        }

        if(! $time->getCampeonato()) {
            array_push($erros, "Informe o campeonato!");
        }

        return $erros;
    }
}