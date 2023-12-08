<?php
require_once(__DIR__ . "/../controller/TimeController.php");
require_once(__DIR__ . "/../model/Time.php");
require_once(__DIR__ . "/../model/Estado.php");
require_once(__DIR__ . "/../model/Campeonato.php");

$msgErro = "";
$time = null;
$timeCont = new TimeController();

    //Usuário clicou no botão gravar (submeteu o formulário)
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $classificacao = is_numeric($_POST['classificacao']) ? $_POST['classificacao'] : null;
    $anoFundacao = is_numeric($_POST['ano']) ? $_POST['ano'] : null;
    $idEstado = is_numeric($_POST['idEstado']) ? $_POST['idEstado'] : null;
    $idCampeonato = is_numeric($_POST['idCampeonato']) ? $_POST['idCampeonato'] : null;
    $idTime = is_numeric($_POST['id']) ? $_POST['id'] : null;

    //Criar um objeto time para persistência
    $time = new Time();
    $time->setNome($nome);
    $time->setId($idTime);
    $time->setClassificacao($classificacao);
    $time->setAnoFundacacao($anoFundacao);
    if($idEstado) {
        $estado = new Estado();
        $estado->setId($idEstado);
        $time->setEstado($estado);
    }
    if($idCampeonato) {
        $Campeonato = new Campeonato();
        $Campeonato->setId($idCampeonato);
        $time->setCampeonato($Campeonato);
    }

    $timeCont = new TimeController();
    $erros = $timeCont->atualizar($time);

$msgErro = "";
if($erros)
    $msgErro = implode("<br>", $erros);

echo $msgErro;