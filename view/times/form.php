<?php 
//Formulário para alunos

require_once(__DIR__ . "/../../controller/EstadoController.php");
require_once(__DIR__ . "/../../controller/CampenatoController.php");
require_once(__DIR__ . "/../include/header.php");

$estadoCont = new EstadoController();
$estados = $estadoCont->listar();

$campCont = new CampeonatoController();
$campeonatos = $campCont->listar();

?>
<h2><?php echo (!$time || $time->getId() <= 0 ? 'Inserir' : 'Alterar');?> Time</h2>

<form id="frmTime" method="POST" >

    <div>
        <label for="txtNome">Nome:</label>
        <input type="text" name="nome" id="txtNome" value="<?php echo($time ? $time->getNome() : ''); ?>" />
    </div>

    <div>
        <label for="numAno">Ano de fundação:</label>
        <input type="number" name="ano" id="numAno" value="<?php echo($time ? $time->getAnoFundacacao() : ''); ?>" />
    </div>

    <div>
        <label for="selEstado">Estado:</label>
        <select id="selEstado" name="estado">
            <option value="">---Selecione---</option>
            
            <?php foreach($estados as $estado): ?>
                <option value="<?= $estado->getId(); ?>"
                    <?php 
                        if ($time && $time->getEstado() &&
                            $time->getEstado()->getId() == $estado->getId())
                            echo "selected";
                    ?>
                >
                    <?= $estado->getNome(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="selCampeonato">Campeonato:</label>
        <select id="selCampeonato" name="camp">
            <option value="">---Selecione---</option>
            
            <?php foreach($campeonatos as $campeonato): ?>
                <option value="<?= $campeonato->getId(); ?>"
                    <?php 
                        if ($time && $time->getCampeonato() &&
                            $time->getCampeonato()->getId() == $campeonato->getId())
                            echo "selected";
                    ?>
                >
                    <?= $campeonato->getNome(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="numClass">Classificação:</label>
        <input type="number" name="classificacao" id="numClass" value="<?php echo($time ? $time->getClassificacao(): ''); ?>" />
    </div>

    <input type="hidden" name="id" value="<?php echo($time ? $time->getId() : 0); ?>" />
    <input type="hidden" name="submetido" value="1" />

    <button type="submit">Gravar</button>
    <button type="reset">Limpar</button>

</form>

<div style="color: red;">
    <?= $msgErro; ?>
</div>

<a href="listar.php">Voltar</a>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>