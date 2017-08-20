<?php
	
require '../config.php';
$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);


	$ID_NOTPLA = (int) $_GET['idNotPla'];

	$sqlNotUpd = "UPDATE `notificacoes_plat` SET `STATUS_NOTPLA`= 1 WHERE `ID_NOTPLA` =" . $ID_NOTPLA; //SELECIONA TODAS AS NOTIFICACOES VISUALIZADAS
	$queryNotUpd = mysql_query($sqlNotUpd, $conexao);
	//$qtdNot -= 1;
	header('location: ../notificacoes.php');
?>