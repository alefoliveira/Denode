<?php
require 'config.php';
$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

$ID_USU = (int) $_GET['ID_USU'];
$ID_SESSAO = (int) $_GET['ID_SESSAO'];


//SELECIONA ATIVIDADES PARA FAZER RELAÇÃO COM AQUELAS APROVADAS PELA EMPRESA
$sqlSes = "SELECT `ID_SESPLA`, `CONFIRMADOS_SESPLA` FROM `sessao_plat` WHERE `ID_EMP` = 1;"; //ALTERAR
$querySes = mysql_query($sqlSes, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sqlSes) E O BANCO DE DADOS


?>

<!-- _____________________ -->
<!-- COMEÇO DA PÁGINA HTML -->
<!-- _____________________ -->

<html lang='pt-br'>

	<head>

		<meta charset="utf-8">

		<title>ADMIN - MINIMAMENTE</title>

		<!-- ESTILOS -->
		<link rel="stylesheet" href="CSS/estilo.css">

		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

		<!-- <script> window.jQuery || document.write('<script src="js/jquery.js"></script>') </script> <!-- Chamada de fallback caso o servidor do jQuery nao carregue -->
	</head>

	<body>

		<h1>PRESENCA CONFIRMADA NA SESSAO <?php echo $ID_SESSAO;?></h1>
		 <?php echo $ID_USU;?>

		<?php 
			if ($resultSes = mysql_fetch_array($querySes)) {

				$confirmados = explode(",",$resultSes['CONFIRMADOS_SESPLA']);

				if (in_array($ID_USU, $confirmados)){
					echo 'ja esta confirmado migo';//alterar
				} else {
					$sqlAttSes = "UPDATE `sessao_plat` SET`CONFIRMADOS_SESPLA`= '" . $resultSes['CONFIRMADOS_SESPLA'] . "," . $ID_USU . "' WHERE ID_SESPLA = " . $resultSes['ID_SESPLA'];
					$queryAttSes = mysql_query($sqlAttSes, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sqlAttSes) E O BANCO DE DADOS
				}
			} else {
				$date = date('Y-m-d H:i:s');
				echo $date;

				//DADOS SESSOES
				$sqlPartSes = "SELECT `PARTICIPANTES_CROEMPPLA` FROM `cronograma_empresa_plat` WHERE `ID_CROEMPPLA` = ". $ID_SESSAO ." ORDER BY `INICIO_CROEMPPLA`";
				$queryPartSes = mysql_query($sqlPartSes, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
				$resultPartSes = mysql_fetch_array($queryPartSes);


				$sqlInsSes = "INSERT INTO `sessao_plat`(`PARTICIPANTES_SESPLA`, `CONFIRMADOS_SESPLA`, `DATA_SESPLA`, `ID_CROEMPPLA`) VALUES ('" . $resultPartSes['PARTICIPANTES_CROEMPPLA'] . "', '" . $ID_USU . "','" . $date . "'," . $ID_SESSAO . ")";
				$queryInsSes = mysql_query($sqlInsSes, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sqlInsSes) E O BANCO DE DADOS
			}

		?>

	</body>

</html>

		

