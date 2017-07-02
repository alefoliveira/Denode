<?php
require '../config.php';

if (!isset($_GET['ID_CROEMPPLA'])) {
    echo('Postagem não existente ( <a href="../cronograma_empresa.php">TESTE</a> )');
}

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());

mysql_select_db($banco);

$ID_CROEMPPLA = (int) $_GET['ID_CROEMPPLA'];

$sql = 'delete from `cronograma_empresa_plat` where ID_CROEMPPLA = ' . $ID_CROEMPPLA;

$query = mysql_query($sql, $conexao);

mysql_close($conexao);

header('location: ../cronograma_empresa.php'); 