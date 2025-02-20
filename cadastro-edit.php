<?php
session_start();
require("conexao.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alphacode</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="shortcut icon" href="assets/logo_alphacode.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .space {
            margin-top: 24px;
        }

        .form-group:focus-within label {
            color: #56B2DF;
        }
    </style>
</head>

<body class="d-flex flex-column">

    <?php

    if (isset($_GET['id'])) {
        $usuario_id = mysqli_real_escape_string($mysqli, $_GET['id']);
        $query = "SELECT * from cadastro WHERE id='$usuario_id'";
        $results = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($results) > 0) {
            $usuario = mysqli_fetch_array($results)

    ?>

            <nav class="navbar navbar-dark w-100" style="background-color: #068ED0; height: 15vh;">
                <div class="d-flex align-items-center justify-content-start">
                    <img src="assets/logo_alphacode.png" height="100px" alt="LogoMarca Alphacode">
                    <p href="#" class="navbar-brand fw-bold" style="font-size: 1.6rem;">Atualizar cadastro de <?= $usuario['nome'] ?></p>
                </div>
            </nav>
            <div class="container " style="height: 75vh;">

                <form action="crud.php" method="POST" class="text-secondary">

                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?= $usuario['id'] ?>">

                    <div class="row space">
                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label class="fw-bold">Nome completo</label>
                                <input type="text" class="textoAzul text-secondary text-secondary" name="nome" value="<?= $usuario['nome'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label class="fw-bold">Data de nascimento</label>
                                <input type="date" class="textoAzul text-secondary" name="dataNascimento" value="<?= $usuario['data_nascimento'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row space">
                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label class="fw-bold">E-mail</label>
                                <input type="email" class="textoAzul text-secondary" name="email" value="<?= $usuario['email'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label class="fw-bold">Profissão</label>
                                <input type="text" class="textoAzul text-secondary" name="profissao" value="<?= $usuario['profissao'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row space">
                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label class="fw-bold">Telefone para contato</label>
                                <input type="tel" class="textoAzul text-secondary" name="telefone" value="<?= $usuario['telefone'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label class="fw-bold">Celular para contato</label>
                                <input type="tel" class="textoAzul text-secondary" name="celular" value="<?= $usuario['celular'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap space">
                        <div class="form-check me-3 mb-2 w-50">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="whatsapp">
                                Número de celular possui Whatsapp
                            </label>
                        </div>

                        <div class="form-check me-3 mb-2">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="email">
                                Enviar notificações por E-mail
                            </label>
                        </div>

                        <div class="form-check mb-2 w-50">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="sms">
                                Enviar notificações por SMS
                            </label>
                        </div>
                    </div>

                    <button class="btn float-end cadastro-btn"><a class="voltar-btn" href="index.php">Voltar</a></button>
                    <button class="float-end cadastro-btn" type="submit" name="update_cadastro">Salvar atualizações</button>


                </form>
            </div>
    <?php

        } else {
            echo 'Cadastro não encontrado';
        }
    }
    ?>
    <?php include('views/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>