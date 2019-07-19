<?php
session_start();
include('conexao.php');


if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location:index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//insert into usuario (usuario,senha) VALUES ('teste', md5('teste'));  - insere na tabela
// select * from usuario   -  consulta na tabela

$query = "select usuario_id, usuario from usuario where usuario = '{$usuario}' and senha = md5 ('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
 $_SESSION['usuario'] = $usuario;
 header('Location: painel.php');
 exit();
} else {
    $_SESSION['não_autenticado'] = true;
    header('Location: login2.php');
    exit();
}