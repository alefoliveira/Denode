<?php
include "../config.php";

$conexao = mysqli_connect($host, $usuario, $senha, $banco) or die('Não foi possivel conectar: '.mysql_error());
mysqli_query($conexao,"SET SESSION sql_mode = ''");

//problema está aqui
$cpfExist = $_GET['cpf'];

$exist = mysqli_query($conexao, "SELECT CPF_PERFUSU FROM perfil_usuario WHERE CPF_PERFUSU = '$cpfExist'");

    if(mysqli_num_rows($exist) > 0) {
    echo "NO";
    echo mysqli_num_rows($exist);
  } else {
    echo "OK";
    echo mysqli_num_rows($exist);
  }
?>