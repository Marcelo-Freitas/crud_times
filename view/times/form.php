<?php
//Formulário para alunos

require_once(__DIR__ . "/../../controller/EstadoController.php");
require_once(__DIR__ . "/../../controller/CampenatoController.php");
require_once(__DIR__ . "/../include/header.php");

$estadoCont = new EstadoController();
$estados = $estadoCont->listar();

$campCont = new CampeonatoController();

?>
<div class="modal modal-signin position-static d-block py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                <label class="fw-bold mb-0 fs-2"><?php echo (!$time || $time->getId() <= 0 ? 'Registrar' : 'Alterar') ?> Time</label>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" href="listar.php"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form id="frmTime" method="POST">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="txtNome" name="nome" placeholder="Rodrigo Góes" value="<?= $time ? $time->getNome() : ''; ?>" />
                        <label for="txtNome">Nome</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control rounded-3" id="numAno" name="ano" placeholder="1899" value="<?= $time ? $time->getAnoFundacacao() : ''; ?>"/>
                        <label for="numAno">Ano de fundação</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control rounded-3" id="selEstado" name="estado" onchange="buscarCampeonatos();" />
                            <option value="">---Selecione---</option>

                            <?php foreach ($estados as $estado) : ?>
                                <option value="<?= $estado ? $estado->getId() : ''; ?>"
                                    <?php
                                        if ($time && $time->getEstado() &&$time->getEstado()->getId() == $estado->getId()){
                                            echo "selected";
                                        }    
                                    ?>
                                >
                                    <?= $estado->getNome(); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="selEstado">Estado</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control rounded-3" id="selCampeonato" name="camp"
                                idSelecionado="<?php echo ($time && $time->getCampeonato() ? $time->getCampeonato()->getId() : '0'); ?>"/>
                        </select>
                        <label for="selCampeonato">Campeonato</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control rounded-3" id="numClass" name="classificacao" placeholder="1º" value="<?= $time ? $time->getClassificacao() : ''; ?>" />
                        <label for="numClass">Classificação</label>
                    </div>

                    <input type="hidden" id="hddBaseUrl" value="<?= BASE_URL ?>" />
                    <input type="hidden" name="id" id="idTime" value="<?php echo ($time ? $time->getId() : 0); ?>" />
                    <input type="hidden" name="submetido" value="1" />

<!--                    <button type="button" class="btn btn-success"-->
<!--                            onclick="inserirTime();">-->
<!--                        Gravar AJAX</button>-->
<!--                    <button type="button" class="btn btn-success"-->
<!--                            onclick="--><?php //echo (!$time || $time->getId() <= 0 ? 'inseriTime();' : 'alterarTime();') ?><!--">-->
<!--                        Alterar AJAX</button>-->

                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type=""
                            onclick="<?php echo (!$time || $time->getId() <= 0 ? 'inseriTime();' : 'alterarTime();') ?>"
                    ><?php echo (!$time || $time->getId() <= 0 ? 'Registrar' : 'Alterar') ?></button>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="reset">Limpar</button>
                    <small class="text-muted">Clicando em <?php echo (!$time || $time->getId() <= 0 ? 'Registrar' : 'Alterar') ?>, você cadastra o time no nosso sistema.</small>
                    <hr class="my-4">
                </form>

                <?php
                if (isset($msgErro) && !empty($msgErro)) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $msgErro;
                    echo '</div>';
                }
                ?>
                <br>
                <div id="divMsgErro" class="alert alert-danger" style="display: none;">

                </div>
                <br>
                <a href="listar.php">Voltar</a>

            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>

<script src="js/campeonatos.js"></script>
