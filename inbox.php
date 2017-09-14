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

		<meta charset="utf-8" />

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
				<img src="img/iconset.svg#svgView(viewBox(4, 115, 17, 16))" alt="Inbox">
				<h1>Inbox</h1>
			</aside>

			<aside id="conteudo">

				<?php
						
						$sqlNot3 = "SELECT `ID_NOTPLA`,`DESCRICAO_NOTPLA`,`REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `PENDENTES_NOTPLA`, `CATEGORIA_NOTPLA` FROM `notificacoes_plat` WHERE `DESTINATARIOS_NOTPLA` LIKE '%" . $idUsu . "%' ORDER BY `DATA_NOTPLA` DESC"; //SELECIONA TODAS AS NOTIFICACOES NAO VISUALIZADAS
						$queryNot3 = mysqli_query($conexao, $sqlNot3);

						while ($resultNot3 = mysqli_fetch_array($queryNot3)){
							
							$data = strtotime($resultNot3['DATA_NOTPLA']);
							$dataFormatada = date("d/m/y", $data);

							$pendentes = explode(',', $resultNot3['PENDENTES_NOTPLA']);

						 	 if (in_array($idUsu, $pendentes)) {
								echo '<li class="item_notificacoes pendentes" id="'.$resultNot3['ID_NOTPLA'].'"><article>
									<img src="img/iconset.svg#svgView(viewBox(4, 116, 17, 18))" alt="Agenda">';

									if($resultNot3['CATEGORIA_NOTPLA'] == 1) { 
										echo '<p class="descricao">A sessão '. $resultNot3['DESCRICAO_NOTPLA'] .' irá começar em 15 minutos. Prepare-se!.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 2) { 
										echo '<p class="descricao">'. $resultNot3['REMETENTE_NOTPLA'] .' convidou você para a sessão '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 3) {

										$sqlRemNot = "SELECT `NOME_PERFUSU`, `SOBRENOME_PERFUSU` FROM `perfil_usuario` WHERE `ID_PERFUSU` =" . $resultNot3['REMETENTE_NOTPLA']; //SELECIONA NOME E SOBRENOME DO REMETENTE DA NOTIFICACAO
										$queryRemNot = mysqli_query($conexao, $sqlRemNot);

										$resultRemNot = mysqli_fetch_array($queryRemNot);

										echo '<p class="descricao">'. $resultRemNot['NOME_PERFUSU'] . ' ' . $resultRemNot['SOBRENOME_PERFUSU'] .' solicitou deixar de participar da sessão '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 4) { 
										echo '<p class="descricao"> Você atingiu a conquista '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';
									} else {
										echo '<p class="descricao"> Você conquistou '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';
									}
										echo '<p class="data">'. $dataFormatada .'</p></article>
								</li>';
							} else {
								echo '<li class="item_notificacoes" id="'.$resultNot3['ID_NOTPLA'].'"><article>
								<img src="img/iconset.svg#svgView(viewBox(4, 116, 17, 18))" alt="Agenda">';
								

								if($resultNot3['CATEGORIA_NOTPLA'] == 1) { 
										echo '<p class="descricao">A sessão '. $resultNot3['DESCRICAO_NOTPLA'] .' irá começar em 15 minutos. Prepare-se!</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 2) { 
										echo '<p class="descricao">'. $resultNot3['REMETENTE_NOTPLA'] .' convidou você para a sessão '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 3) {

										$sqlRemNot = "SELECT `NOME_PERFUSU`, `SOBRENOME_PERFUSU` FROM `perfil_usuario` WHERE `ID_PERFUSU` =" . $resultNot3['REMETENTE_NOTPLA']; //SELECIONA NOME E SOBRENOME DO REMETENTE DA NOTIFICACAO
										$queryRemNot = mysqli_query($conexao, $sqlRemNot);

										$resultRemNot = mysqli_fetch_array($queryRemNot);

										echo '<p class="descricao">'. $resultRemNot['NOME_PERFUSU'] . ' ' . $resultRemNot['SOBRENOME_PERFUSU'] .' solicitou deixar de participar da sessão '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 4) { 
										echo '<p class="descricao"> Você atingiu a conquista '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';
									} else {
										echo '<p class="descricao"> Você conquistou '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';
									}

								echo '<p class="data">'. $dataFormatada .'</p></article>
								</li>';
							}
						} ?>
			</aside>

		</section>
	</body>
</html>