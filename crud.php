<?php

session_start();
require("conexao.php");

//cadastrando contato
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


?>