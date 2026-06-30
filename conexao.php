<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "empresa_php";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
if (!$conexao) {
    die ("Erro ao conectar com banco de dados.");
}
mysqli_set_charset($conexao, "utf8");
?>