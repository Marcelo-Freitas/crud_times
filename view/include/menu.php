<?php
require_once __DIR__ . '/../../util/config.php';
require_once __DIR__ . '/../../controller/LoginController.php';

$loginCont = new LoginController();
$nomeUsuario = $loginCont->getNomeUsuario();

?>

<nav class="py-2 bg-dark border-bottom rounded-2">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="<?= BASE_URL ?>/index.php" class="nav-link link-light px-2 active" aria-current="page">Home</a></li>
            <div class="dropdown">
                <a class="nav-link link-light px-2 active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastros</a>
                <ul class="dropdown-menu" data-bs-theme="dark">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="<?= BASE_URL ?>/view/times/listar.php">
                            <span class="d-inline-block bg-success rounded-circle p-1"></span>
                        Times
                        </a>    
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                            <span class="d-inline-block bg-danger rounded-circle p-1"></span>
                        Campeonatos
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                            <span class="d-inline-block bg-primary rounded-circle p-1"></span>
                        Premiações
                        </a>
                    </li>
                </ul>
            </div>
            <a class="nav-link link-light px-2 active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $nomeUsuario ?></a>
            <ul class="dropdown-menu" data-bs-theme="dark">
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="<?= BASE_URL ?>/view/login/sair.php">
                        <span class="d-inline-block bg-success"></span>
                    Sair
                    </a>    
                </li>
            </ul>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="<?= BASE_URL ?>/view/login/login.php" class="nav-link text-blue fw-bold px-2">Login</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-blue fw-bold px-2">Sign up</a></li>
        </ul>
    </div>
</nav>

<header class="py-3 mb-4 border-bottom bg-dark rounded-2">
    <div class="container d-flex flex-wrap justify-content-center">
        <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-light text-decoration-none">
            <span class="fs-4 tex">TIMES-BR</span> &nbsp;&nbsp;&nbsp;
            <i class="fa-solid fa-futbol"></i>
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
    </div>
</header>
