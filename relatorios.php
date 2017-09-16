<?php
	require 'config.php';

	session_start();//INICIO SESSAO
	$nome = $_SESSION['NOME_PERFUSU'];
	$sobrenome = $_SESSION['SOBRENOME_PERFUSU'];
	$idUsu = $_SESSION["ID_PERFUSU"];

	$sqlUsu = "SELECT `TIPO_PERFUSU`, `ID_EMP` FROM `perfil_usuario` WHERE `ID_PERFUSU`=" . $idUsu; 
	$queryUsu =	mysqli_query($conexao, $sqlUsu);
	$resultUsu = mysqli_fetch_array($queryUsu);
?>


<html lang='pt-br'>


	<head>

		<meta charset="utf-8">

		<title>DENODE - INBOX</title>

		<!-- ESTILOS -->
		<link rel="stylesheet" type="text/css" href="css/inbox.css">

		<!-- SCRIPTS -->
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

	</head>

	<body>
		
		<?php include 'master.php'; ?>
		<script>
			$(document).ready(function(){
				$(".menu_inicio").css('font-weight', '700'); //INCLUIR SCRIPT E ALTERAR EM CADA PAGINA
			});
		</script>

		<section id="container">

			<aside = id="topo">
				<img src="img/iconset.svg#svgView(viewBox(4, 117, 17, 16))" alt="Inbox">
				<h1>Inbox</h1>
			</aside>

			<aside id="conteudo">

				SEU CODIGO VAI AQUI MIGA!!!!!!!!!!!

			</aside>

		</section>
	</body>
</html>