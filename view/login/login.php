<?php
//Página com o formulário de login

require_once(__DIR__ . "/../../controller/LoginController.php");

$msgErro = "";
$usuario = "";
$senha = "";

if(isset($_POST['submetido'])) {
    $usuatio = $_POST['usuario'];
    $senha = $_POST['senha'];

    $loginCont = new LoginController();
    $erros = $loginCont->logar($usuatio, $senha);

    //Redirecionar para a página inicial
    if(! $erros) {
        header("location: " . BASE_URL);
        exit;
    }

    //se tiver erros, exibe-os
    $msgErro = implode("<br>", $erros);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Crud Alunos</title>
</head>
<body>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../../img/login image.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="" method="POST">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Logar conta com</p>
                        <button type="button" class="btn btn-dark btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-dark btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-dark btn-floating mx-1">
                            <i class="fab fa-linkedin-in"></i>
                        </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Ou</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input id="txtUsu" type="text" class="form-control form-control-lg" name="usuario" value="<?= $usuario; ?>" />
                        <label class="form-label" for="txtUsu">Usuário</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input id="txtSenha" type="password" class="form-control form-control-lg" name="senha" value="<?= $senha; ?>" />
                        <label class="form-label" for="txtSenha">Senha</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="lembrar" />
                            <label class="form-check-label" for="lembrar"> Lembrar-se </label>
                        </div>
                        <a href="#!" class="text-body">Esqueceu sua senha?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="hidden" name="submetido" value="1">
                        <button class="btn btn-dark btn-lg mb-3"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Entrar</button>
                        <div class="col-6">
                            <?php if($msgErro) :?>
                                <div class="alert alert-danger"> <?= $msgErro ?></div>
                            <?php endif; ?>
                        </div>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Não possui uma conta ainda? <a href="#!" class="link-primary">Registrar-se</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2023. Marcelo Amador e Rafael Soster.
        </div>
        <!-- Copyright -->

        <!-- Right -->
        <div>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
        <!-- Right -->
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>