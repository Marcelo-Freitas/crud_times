<?php

require_once(__DIR__ . "/../model/Time.php");
require_once(__DIR__ . "/../model/Campeonato.php");
require_once(__DIR__ . "/../controller/TimeController.php");

$nome = ($_POST['nome']) ? $_POST['nome'] : 0;
$anoFundacao = is_numeric($_POST['ano']) ? $_POST['ano'] : 0;
$idEstado = is_numeric($_POST['idEstado']) ? $_POST['idEstado'] : 0;
$idCampeonato = is_numeric($_POST['idCampeonato']) ? $_POST['idCampeonato'] : 0;
$classificacao = is_numeric($_POST['classificacao']) ? $_POST['classificacao'] : 0;

$time = new Time();

//Sets dos valores de time
$time->setNome($nome);
$time->setAnoFundacacao($anoFundacao);
if($idCampeonato) {
    $camp = new Campeonato();
    $camp->setId($idCampeonato);
    $time->setCampeonato($camp);
}

//Chamar o controller para salvar a turma
$timeCont = new TimeController();
$erros = $timeCont->salvar($time);

//Retornar os erros ou uma string vazia se não houverem erros
$msgErro = "";
if($erros)
    $msgErro = implode("<br>", $erros);

echo $msgErro;
