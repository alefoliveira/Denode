<?php
require '../config.php';

session_start();//INICIO SESSAO
$idUsu = $_SESSION["ID_PERFUSU"];
$sqlUsu = "SELECT `ID_EMP` FROM `perfil_usuario` WHERE `ID_PERFUSU`=" . $idUsu; 
$queryUsu = mysql_query($sqlUsu, $conexao);
$resultUsu = mysql_fetch_array($queryUsu);

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