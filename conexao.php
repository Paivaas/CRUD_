<?php

    $hostname = "localhost";
    $bancodedados = "bd_alphacode";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if($mysqli->connect_errno){
        echo "Falha ao conectar com o banco de dados mysql:(" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
    }else
     // echo "Conectado ao banco de dados!!!";

?>