<!-- Arquivo raiz do projeto, dedicado ao cadastro de usuários 
e visualização dos já cadastrados através da função CRUD (READ) -->

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
    <link rel="stylesheet" href="css/global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .space {
            margin-top: 24px;
        }

        .spaceB {
            margin-bottom: 24px;
        }

        .form-group:focus-within label {
            color: #56B2DF;
        }

    </style>
</head>

<body class="d-flex flex-column justify-content-between" style="height: 100vh;">
    <?php include('views/nav.php') ?>

    <div style="display: flex; flex-direction:column; gap: 60px;" >
        <div class="container h-50">
            <form action="crud.php" method="POST" class="text-secondary">
                <div class="row space">
                    <div class="col-md-6">
                        <div class="form-group d-flex flex-column">
                            <label class="fw-bold">Nome completo</label>
                            <input class="textoAzul" type="text" name="nome" placeholder="Ex.: Letícia Pacheco dos Santos" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group d-flex flex-column">
                            <label class="fw-bold">Data de nascimento</label>
                            <input class="textoAzul text-secondary" type="date" name="dataNascimento" placeholder="Ex.: 03/10/2003" required>
                        </div>
                    </div>
                </div>

                <div class="row space">
                    <div class="col-md-6">
                        <div class="form-group d-flex flex-column">
                            <label class="fw-bold">E-mail</label>
                            <input class="textoAzul" type="email" name="email" placeholder="Ex.: leticia@gmail.com" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group d-flex flex-column">
                            <label class="fw-bold">Profissão</label>
                            <input class="textoAzul" type="text" name="profissao" placeholder="Ex.: Desenvolvedora Web" required>
                        </div>
                    </div>
                </div>

                <div class="row space">
                    <div class="col-md-6">
                        <div class="form-group d-flex flex-column">
                            <label class="fw-bold">Telefone para contato</label>
                            <input class="textoAzul" type="tel" name="telefone" placeholder="Ex.: (11) 4033-2019" max="11" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group d-flex flex-column">
                            <label class="fw-bold">Celular para contato</label>
                            <input class="textoAzul" type="tel" name="celular" placeholder="Ex.: (11) 98493-2039" max="11" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap space">
                    <div class="form-check me-3 mb-2 w-50">
                        <input class="form-check-input" type="checkbox" name="checkWhatsapp" value="s">
                        <label class="form-check-label" for="whatsapp">
                            Número de celular possui Whatsapp
                        </label>
                    </div>

                    <div class="form-check me-3 mb-2">
                        <input class="form-check-input" type="checkbox" name="checkEmail" value="s">
                        <label class="form-check-label" for="email">
                            Enviar notificações por E-mail
                        </label>
                    </div>

                    <div class="form-check mb-2 w-50">
                        <input class="form-check-input" type="checkbox" name="checkSMS" value="s">
                        <label class="form-check-label" for="sms">
                            Enviar notificações por SMS
                        </label>
                    </div>
                </div>

                <button class="float-end cadastro-btn spaceB" type="submit" name="create_cadastro">Cadastrar contato</button>

            </form>
        </div></br>

        <div class="container">
            <div class="card-body">
                <table class="table text-center " style="box-shadow: 3px 3px 3px rgba(109, 109, 109, 0.3);">
                    <thead>
                        <tr class="table-info">
                            <th class="text-white" style="background-color: #068ED0;">Nome</th>
                            <th class="text-white" style="background-color: #068ED0;">Data de nascimento</th>
                            <th class="text-white" style="background-color: #068ED0;">E-mail</th>
                            <th class="text-white" style="background-color: #068ED0;">Celular pra contato</th>
                            <th class="text-white" style="background-color: #068ED0;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Mostrando cadastros - READ -->
                        <?php
                        $query = "SELECT * from cadastro";
                        $results = mysqli_query($mysqli, $query);
                        if (mysqli_num_rows($results) > 0) {
                            foreach ($results as $results) {

                        ?>
                                <div style="background-color: #068ED0;">
                                    <tr>
                                        <td class="text-secondary"><?= $results['nome'] ?></td>
                                        <td class="text-secondary"><?= $results['data_nascimento'] ?></td>
                                        <td class="text-secondary"><?= $results['email'] ?></td>
                                        <td class="text-secondary"><?= $results['celular'] ?></td>
                                        <td>
                                            <a href="cadastro-edit.php?id=<?= $results['id'] ?>" class="btn">
                                                <img src="assets/editar.png" alt="Botão de editar">
                                            </a>
                                            <form action="crud.php" method="POST" class="d-inline">
                                                <button onclick="return confirm('Deseja excluir o cadastro de <?= $results['nome'] ?>?')" type="submit" name="delete_cadastro" value="<?= $results['id'] ?>" class="btn">
                                                    <img src="assets/excluir.png" alt="">
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                </div>
                        <?php
                            }
                        } else {
                            echo "Nenhum cadastro encontrado.";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include('views/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>