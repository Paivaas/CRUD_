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

    $query = "INSERT INTO cadastro (nome, email, data_nascimento, profissao, telefone, celular) VALUES ('$nome', '$email', '$dateN', '$profissao', '$telefone', '$celular')";

    $statement = $mysqli->prepare($query);
    $statement->execute();

    header('Location: index.php');


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
    
	$query = "UPDATE cadastro SET nome = '$nome',  data_nascimento = '$dateN', email = '$email', profissao = '$profissao', telefone = '$telefone', celular = '$celular'";
	$query .= " WHERE id = '$usuario_id'";

	mysqli_query($mysqli, $query);

    header('Location: index.php');

}

//delete
if(isset($_POST['delete_cadastro'])) {

    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['delete_cadastro']);
    // echo $usuario_id;
    
    $query = "DELETE FROM cadastro WHERE id='$usuario_id'";

    $statement = $mysqli->prepare($query);

    $_SESSION['mensagem'] = 'Cadastro Excluido com sucesso!';
    header('Location: index.php');
   $statement->execute();

}


?>