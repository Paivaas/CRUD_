<!-- Arquivo responsável pelas funções do CRUD (CREATE, UPDATE e DELETE) -->

<?php

session_start();
require("conexao.php");

// Cadastrando contato - CREATE
if(isset($_POST['create_cadastro'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dateN = $_POST['dataNascimento'];
    $profissao = $_POST['profissao'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $checkWhatsapp = isset($_POST['checkWhatsapp']) ? "s" : "n";
    $checkEmail = isset($_POST['checkEmail']) ? "s" : "n";
    $checkSMS = isset($_POST['checkSMS']) ? "s" : "n";

    $query = "INSERT INTO cadastro (nome, email, data_nascimento, profissao, telefone, celular, check1, check2, check3) VALUES ('$nome', '$email', '$dateN', '$profissao', '$telefone', '$celular', ?, ?, ?)";
    $statement = $mysqli->prepare($query);

    $statement->bind_param("sss", $checkWhatsapp, $checkEmail, $checkSMS);
    if ($statement->execute()) {
        echo "Cadastro feito";
    } else {
        echo "Erro: " . $statement->error;
    }
    $statement->close();

    header('Location: index.php');
    exit();

};

// Alterando infos do cadastro escolhido -  UPDATE
if (isset($_POST['update_cadastro'])) {

    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['usuario_id']);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dateN = $_POST['dataNascimento'];
    $profissao = $_POST['profissao'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $checkWhatsapp = isset($_POST['checkWhatsapp']) ? "s" : "n";
    $checkEmail = isset($_POST['checkEmail']) ? "s" : "n";
    $checkSMS = isset($_POST['checkSMS']) ? "s" : "n";
    
	$query = "UPDATE cadastro SET nome = '$nome',  data_nascimento = '$dateN', email = '$email', profissao = '$profissao', telefone = '$telefone', celular = '$celular',";
	$query .= "check1 = ?, check2 = ?, check3 = ?";
    $query .= " WHERE id = '$usuario_id'";

    $statement = $mysqli->prepare($query);

    $statement->bind_param("sss", $checkWhatsapp, $checkEmail, $checkSMS);
    if ($statement->execute()) {
        echo "Cadastro feito";
    } else {
        echo "Erro: " . $statement->error;
    }
    $statement->close();

    header('Location: index.php');
    exit();

}

//Deletando cadastros - DELETE
if(isset($_POST['delete_cadastro'])) {

    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['delete_cadastro']);
    // echo $usuario_id;
    
    $query = "DELETE FROM cadastro WHERE id='$usuario_id'";

    $statement = $mysqli->prepare($query);
    header('Location: index.php');
    $statement->execute();

}

?>