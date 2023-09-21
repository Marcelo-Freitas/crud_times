<?php 
include_once __DIR__ . '/view/include/header.php'; 
require_once __DIR__ . '/util/config.php';
?>

<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="<?= BASE_URL ?>/view/times/listar.php" class="btn btn-primary">Listagem de Times</a>
  </div>
</div>

<?php
include_once __DIR__ . '/view/include/footer.php';
?>