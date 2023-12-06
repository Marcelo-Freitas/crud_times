<?php

require_once(__DIR__ . "/../controller/CampenatoController.php");

$idEstado = intval($_GET['idEstado']);

$campCont = new CampeonatoController();
$campeonatos = $campCont->listar($idEstado);

echo json_encode($campeonatos, JSON_UNESCAPED_UNICODE);