<?php 
//Página view para listagem de times
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/TimeController.php");

$timeCont = new TimeController();
$times = $timeCont->listar();
?>

<?php 
require(__DIR__ . "/../include/header.php");
?>

<h2>Listagem de times</h2>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>
<br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Ano de fundação</th>
            <th>Estado</th>
            <th>Campeonato</th>
            <th>Classificação</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($times as $t): ?>
            <tr>
                <td><?= $t->getNome(); ?></td>
                <td><?= $t->getAnoFundacacao(); ?></td>
                <td><?= $t->getEstado(); ?></td>
                <td><?= $t->getCampeonato(); ?></td>
                <td><?= $t->getClassificacao(); ?></td>
                <td><a href="alterar.php?idTime=<?= $t->getId() ?>"> 
                        <img src="../../img/btn_editar.png" /> 
                    </a>
                </td>
                <td><a href="excluir.php?idTime=<?= $t->getId() ?>"
                    onclick="return confirm('Confirma a exclusão')"> 
                        <img src="../../img/btn_excluir.png" /> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php 
require(__DIR__ . "/../include/footer.php");
?>