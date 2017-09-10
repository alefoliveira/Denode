<?php
	
require '../config.php';
$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

session_start();//INICIO SESSAO
$nome = $_SESSION['NOME_PERFUSU'];
$sobrenome = $_SESSION['SOBRENOME_PERFUSU'];
$idUsu = $_SESSION["ID_PERFUSU"];


	
	$ID_NOTPLA = (int) $_GET['idNotPla'];

	$sqlNot3 = "SELECT `PENDENTES_NOTPLA` FROM `notificacoes_plat` WHERE `ID_NOTPLA` =" . $ID_NOTPLA; //SELECIONA TODAS AS NOTIFICACOES NAO VISUALIZADAS
	$queryNot3 = mysql_query($sqlNot3, $conexao);
	$resultNot3 = mysql_fetch_array($queryNot3);

	$pendentes = explode(',', $resultNot3['PENDENTES_NOTPLA']);

	$posicaoUsu = array_search($idUsu, $pendentes);

	unset($pendentes[$posicaoUsu]);

	$pendentesConcat = implode(',', $pendentes);

	var_dump($pendentesConcat);

	$sqlNotUpd = "UPDATE `notificacoes_plat` SET `PENDENTES_NOTPLA`='". $pendentesConcat ."' WHERE `ID_NOTPLA` =" . $ID_NOTPLA; //SELECIONA TODAS AS NOTIFICACOES VISUALIZADAS
	$queryNotUpd = mysql_query($sqlNotUpd, $conexao);
	//$qtdNot -= 1;
	//header('location: ../notificacoes.php');
?>