<?php 
require_once(__DIR__ . "/../../controller/TimeController.php");
require_once(__DIR__ . "/../../model/Time.php");
require_once(__DIR__ . "/../../model/Estado.php");
require_once(__DIR__ . "/../../model/Campeonato.php");

$msgErro = "";
$time = null;
$timeCont = new TimeController();

if(isset($_POST['submetido'])) {
    //Usuário clicou no botão gravar (submeteu o formulário)
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $classificacao = is_numeric($_POST['classificacao']) ? $_POST['classificacao'] : null;
    $anoFundacao = is_numeric($_POST['ano']) ? $_POST['ano'] : null;
    $idEstado = is_numeric($_POST['estado']) ? $_POST['estado'] : null;
    $idCampeonato = is_numeric($_POST['camp']) ? $_POST['camp'] : null;
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

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($variable);
    }


} else {
    //Usuário apenas entrou na página para alterar
    $idTime = 0;
    if (isset($_GET["idTime"])) {
        $idTime = $_GET["idTime"];
    }
    $time = $timeCont->buscarPorId($idTime);
    if (!$time) {
        echo "Time não encontrado!";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}
//Inclui o formulário
include_once(__DIR__ . "/form.php");