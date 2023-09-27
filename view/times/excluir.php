<?php
require __DIR__.'/../../controller/TimeController.php';


$id = 0;

if (isset($_GET['idTime'])) {
    $idTime = $_GET["idTime"];
}

$timeCont = new TimeController();
$time = $timeCont->buscarPorId($idTime);

if (! $time) {
    echo "Time não encontrado";
    echo "<a href='listar.php'>Voltar</a>";
}

$timeCont->excluirPorId($time->getId());

header("location:listar.php");