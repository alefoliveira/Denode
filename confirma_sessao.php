<?php
require 'config.php';
$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

$ID_USU = (int) $_GET['ID_USU'];
$ID_SESSAO = (int) $_GET['ID_SESSAO'];


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

	</body>
	
</html>

		

