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
    <link rel="shortcut icon" href="assets/logo_alphacode.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style></style>

</head>

<body class="d-flex flex-column h-100 vh-100">

    <?php

    if (isset($_GET['id'])) {
        $usuario_id = mysqli_real_escape_string($mysqli, $_GET['id']);
        $query = "SELECT * from cadastro WHERE id='$usuario_id'";
        $results = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($results) > 0) {
            $usuario = mysqli_fetch_array($results)

    ?>
            <nav class="navbar navbar-dark w-100" style="background-color: #068ED0;">
                <div class="d-flex align-items-center justify-content-start ">
                    <img src="assets/logo_alphacode.png" alt="">
                    <p href="#" class="navbar-brand fw-bold" style="font-size: 1.6rem;">Cadastro de <?= $usuario['nome'] ?></p>
                </div>
                <a href="index.php" class="btn float-end">Voltar</a>
            </nav>
            <div class="container">

                <form action="crud.php" method="POST">

                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?= $usuario['id'] ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome completo</label>
                                <input type="text" class="form-control" name="nome" value="<?= $usuario['nome'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data de nascimento</label>
                                <input type="date" class="form-control" name="dataNascimento" value="<?= $usuario['data_nascimento'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" value="<?= $usuario['email'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Profissão</label>
                                <input type="text" class="form-control" name="profissao" value="<?= $usuario['profissao'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefone para contato</label>
                                <input type="tel" class="form-control" name="telefone" value="<?= $usuario['telefone'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular para contato</label>
                                <input type="tel" class="form-control" name="celular" value="<?= $usuario['celular'] ?>">
                            </div>
                        </div>
                    </div>

                    <button class="float-end" type="submit" name="update_cadastro">Salvar</button>

                </form>
            </div>

    <?php

        } else {
            echo 'Cadastro não encontrado';
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>



</html>