<?php
include_once __DIR__ . '/view/include/header.php';
require_once __DIR__ . '/util/config.php';
?>

    <div class="row mt-3 justify-content-center">
        <div class="col-3">
            <div class="card text-center">
                <img class="card-image-top mx-auto" src="img/img_marcelo12.png" style="max-width: 200px; height: auto;" />
                <div class="card-body">
                    <h5 class="card-title">Times</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="<?= BASE_URL ?>/view/times/listar.php" class="card-link">
                            Listagem de Times</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <br><br>

    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-2">
                <img src="img/flamengo.jpg" style="max-width: 40%; max-height: 40%;">
            </div>
            <div class="col-2">
                <img src="img/palmeiras.png" style="max-width: 40%; max-height: 40%;">
            </div>
            <div class="col-2">
                <img src="img/atletico.png" style="max-width: 40%; max-height: 40%;">
            </div>
            <div class="col-2">
                <img src="img/gremio.png" style="max-width: 40%; max-height: 40%;">
            </div>
            <div class="col-2">
                <img src="img/atletico pr.png" style="max-width: 40%; max-height: 40%;">
            </div>
            <div class="col-2">
                <img src="img/santos.png" style="max-width: 40%; max-height: 40%;">
            </div>
        </div>
    </div>

<?php
include_once __DIR__ . '/view/include/footer.php';
?>