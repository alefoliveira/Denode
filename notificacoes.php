<?php
require 'config.php';

session_start();//INICIO SESSAO
$nome = $_SESSION['NOME_PERFUSU'];
$sobrenome = $_SESSION['SOBRENOME_PERFUSU'];
$idUsu = $_SESSION["ID_PERFUSU"];



$sqlUsu = "SELECT `TIPO_PERFUSU`, `ID_EMP` FROM `perfil_usuario` WHERE `ID_PERFUSU`=" . $idUsu; 
$queryUsu = mysql_query($sqlUsu, $conexao);
$resultUsu = mysql_fetch_array($queryUsu);


$sqlNotVis = "SELECT `ID_NOTPLA`,`DESCRICAO_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA` FROM `notificacoes_plat` WHERE `DESTINATARIOS_NOTPLA` LIKE '%" . $idUsu . "%' AND `STATUS_NOTPLA` = 1"; //SELECIONA TODAS AS NOTIFICACOES VISUALIZADAS
$queryNotVis = mysql_query($sqlNotVis, $conexao);
?>

<!-- _____________________ -->
<!-- COMEÇO DA PÁGINA HTML -->
<!-- _____________________ -->

<html lang='pt-br'>


<head>

	<meta charset="utf-8">

	<title>ADMIN - MINIMAMENTE</title>

	<!-- ESTILOS -->
	<link rel="stylesheet" type="text/css" href="css/master.css">

	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

	<!-- <script> window.jQuery || document.write('<script src="js/jquery.js"></script>') </script> <!-- Chamada de fallback caso o servidor do jQuery nao carregue -->
</head>

<body>
	
	<?php include 'master.php'; ?>
	<script>
		$(document).ready(function(){
			$(".menu_inicio").css('font-weight', '700'); //INCLUIR SCRIPT E ALTERAR EM CADA PAGINA
		});
	</script>
	
	<h1>Notificacoes</h1>


		<a href="historicoNotificacoes.php?idUsu=">Ver Mais</a>
		<?php echo $idUsu ?>

		<div id="contadorNot">Qtd Notif.: <p><?php echo $qtdNot ?></p></div>

		<div id="notificacoes">
		oi
			<?php 


			$sqlNot2 = "SELECT `ID_NOTPLA`,`DESCRICAO_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA` FROM `notificacoes_plat` WHERE `DESTINATARIOS_NOTPLA` LIKE '%" . $idUsu . "%'"; //SELECIONA TODAS AS NOTIFICACOES NAO VISUALIZADAS
			$queryNot2 = mysql_query($sqlNot2, $conexao);
			while ($resultNot2 = mysql_fetch_array($queryNot2)){
				
				echo '<li style="color:'.$resultNot2['COR_NOTPLA'].'" class="novaNot" id="'.$resultNot2['ID_NOTPLA'].'">'.$resultNot2['DESCRICAO_NOTPLA'].'<br/>'.$resultNot2['DATA_NOTPLA'].'</li>';

			} 


			$sqlNotVis2 = "SELECT `ID_NOTPLA`,`DESCRICAO_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA` FROM `notificacoes_plat` WHERE  `DESTINATARIOS_NOTPLA` LIKE '%" . $idUsu . "%' AND `STATUS_NOTPLA` = 1"; //SELECIONA TODAS AS NOTIFICACOES VISUALIZADAS
			$queryNotVis2 = mysql_query($sqlNotVis2, $conexao);

			 while ($resultNotVis2 = mysql_fetch_array($queryNotVis2)){
				echo '<li id="'.$resultNotVis2['ID_NOTPLA'].'">'.$resultNotVis2['DESCRICAO_NOTPLA'].'<br/>'.$resultNotVis2['DATA_NOTPLA'].'</li>~ooioioi';

			} ?>
		</div>

		<!-- POP-UP -->
		<div id="popUp_Not">
			<h4><?php echo $resultNot2['DESCRICAO_NOTPLA']; ?>blah</h4>
		</div>

		<!--script type="text/javascript">
			
			$(document).ready(function(){



				$("#notificacoes").css('display', 'none');
				$("#popUp_Not").css('display', 'none');


				$("#contadorNot").click(function(e){
					e.stopPropagation();
	 				$("#notificacoes").css('display', 'block');
				});

				/*$(document).click(function(e){
					$("#notificacoes").css('display', 'none');
				});*/

				$("#contadorNot").click(function(e){
					e.stopPropagation();
	 				$("#notificacoes").css('display', 'block');
				});

				$(".novaNot").click(function(){
					
					$qtdNot = <?php echo json_encode($qtdNot) ?>;
					$idNotPla = $(".novaNot").attr("id");
					$.ajax("apoio/consulta_notificacoes.php?idNotPla=" + $idNotPla , {
						success: function(response) {
							$qtdNot -= 1;
							$('#contadorNot p').text($qtdNot);
							$('#' + $idNotPla).css('color', '#000');
						}
					});
				});

			});


		</script-->
</body>

</html>