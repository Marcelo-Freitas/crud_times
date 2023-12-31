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

<div class="container table-responsive">
    <h2 class="my-4">Listagem de times</h2>
    <br>

    <table class="table table-striped rounded-3">
        <thead>
            <tr>
                <th class="bg-dark text-light">Nome</th>
                <th class="bg-dark text-light">Ano de fundação</th>
                <th class="bg-dark text-light">Estado</th>
                <th class="bg-dark text-light">Campeonato</th>
                <th class="bg-dark text-light">Classificação</th>
                <th class="bg-dark" style="color: gold;">Alterar</th>
                <th class="bg-dark" style="color: red;">Excluir</th>
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
    <br>

    <div>
        <a class="btn btn-dark btn-outline-warning" href="inserir.php">Inserir</a>
    </div>
    <br>
</div>



<?php 
require(__DIR__ . "/../include/footer.php");
?>