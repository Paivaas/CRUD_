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
    <?php include('components/nav.php') ?>

    <div class="container">
        <form action="crud.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome completo</label>
                        <input type="text" class="form-control" name="nome" placeholder="Ex.: Letícia Pacheco dos Santos">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Data de nascimento</label>
                        <input type="date" class="form-control" name="dataNascimento" placeholder="Ex.: 03/10/2003">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Ex.: leticia@gmail.com">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Profissão</label>
                        <input type="text" class="form-control" name="profissao" placeholder="Ex.: Desenvolvedora Web">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telefone para contato</label>
                        <input type="tel" class="form-control" name="telefone" placeholder="Ex.: (11) 4033-2019">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Celular para contato</label>
                        <input type="tel" class="form-control" name="celular" placeholder="Ex.: (11) 98493-2039">
                    </div>
                </div>
            </div>

            <button class="float-end" type="submit" name="create_cadastro">Cadastrar</button>

        </form>
    </div>

    <!-- <?php include('components/footer.php') ?> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>



</html>