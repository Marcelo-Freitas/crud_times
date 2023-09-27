<?php 
require_once(__DIR__ . "/../../controller/TimeController.php");
require_once(__DIR__ . "/../../model/Time.php");
require_once(__DIR__ . "/../../model/Estado.php");
require_once(__DIR__ . "/../../model/Campeonato.php");

$msgErro = "";
$time = null;


if(isset($_POST['submetido'])) {
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $classificacao = is_numeric($_POST['classificacao']) ? $_POST['classificacao'] : null;
    $anoFundacao = is_numeric($_POST['ano']) ? $_POST['ano'] : null;
    $idEstado = is_numeric($_POST['estado']) ? $_POST['estado'] : null;
    $idCampeonato = is_numeric($_POST['camp']) ? $_POST['camp'] : null;
    
    //Criar um objeto time para persistência
    $time = new Time();
    $time->setNome($nome);
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

    //Cria um TimeController
    $timeCont = new TimeController();
    $erros = $timeCont->inserir($time);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($variable);
    }
}


//Inclui o formulário
include_once(__DIR__ . "/form.php");


