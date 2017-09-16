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

		<title>DENODE - AGENDA</title>

		<!-- ESTILOS -->
		<link rel="stylesheet" type="text/css" href="css/agenda.css">

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
				<img src="img/iconset.svg#svgView(viewBox(4, 117, 17, 16))" alt="Agenda">
				<h1>Agenda</h1>
			</aside>

			<aside id="conteudo">

				<?php 

					$sqlCroEmp = "SELECT `ID_CROEMPPLA`, `TITULO_CROEMPPLA`, `ATIVIDADES_CROEMPPLA`, `INICIO_CROEMPPLA`, `FIM_CROEMPPLA`, `PARTICIPANTES_CROEMPPLA`, `DIAS_CROEMPPLA` FROM `cronograma_empresa_plat` WHERE `ID_EMP` = " . $resultUsu['ID_EMP'] . " AND `ATIVO_CROEMPPLA`= 1 ORDER BY `INICIO_CROEMPPLA`";
					$queryCroEmp =	mysqli_query($conexao, $sqlCroEmp);

					var_dump($localtime);

					$i = 0;
				   $horariosSes = [];

					while ($resultCroEmp = mysqli_fetch_array($queryCroEmp)) { ?>

						
						
					  	<?php 
						
						if(!in_array($resultCroEmp['INICIO_CROEMPPLA'], $horariosSes)) {

					  		$horariosSes[$i] = $resultCroEmp['INICIO_CROEMPPLA']; 
							$i++;

					  	} 

					  	$diasSes = explode(",",$resultCroEmp['DIAS_CROEMPPLA']);
					  	if (in_array(1, $diasSes)) { $segundaSes [$i] = $resultCroEmp['TITULO_CROEMPPLA']; }
					  	if (in_array(2, $diasSes)){ $tercaSes [$i] = $resultCroEmp['TITULO_CROEMPPLA']; }
						if (in_array(3, $diasSes)){ $quartaSes [$i] = $resultCroEmp['TITULO_CROEMPPLA']; }
						if (in_array(4, $diasSes)){ $quintaSes [$i] = $resultCroEmp['TITULO_CROEMPPLA']; }
						if (in_array(5, $diasSes)){ $sextaSes [$i] = $resultCroEmp['TITULO_CROEMPPLA']; }

							$totalHorarios = count($horariosSes);


						/*if (in_array(1, $diasSes)) {
							if ($countSes < $totalHorarios) {
							}
						}*/
				  	} ?>
					<!--section class="horarios">
				  		 
					  	 for ($countSes = 0; $countSes < $totalHorarios; $countSes++) {

				  			$inicioSes = explode(":",$horariosSes[$countSes]);
								  
						  	echo '<p>' . $inicioSes[0] . ':' . $inicioSes[1] . '</p>';


						}  ?>
					</section>

					<section id="calendario">
						<aside>
							<p class="titulo">Hora</p>
							<p class="horario">07:00</p>
							<p class="horario">08:00</p>
							<p class="horario">09:00</p>
						</aside>
						<aside>
							<p class="titulo">Seg</p>
							<p class="item_sessao">CCCC</p>
						</aside>
						<aside>
							<p class="titulo">Ter</p>
							<p class="item_sessao">BBBBBB</p>
							<p class="item_sessao">AAAAA</p>
							<p class="item_sessao">AAABBB</p>
							<p class="item_sessao">CCCCCC</p>
						</aside>
						<aside>
							<p class="titulo">Qua</p>
							<p class="item_sessao">AAAAA</p>
							<p class="item_sessao">AAABBB</p>
							<p class="item_sessao">CCCCCCC</p>
						</aside>
						<aside>
							<p class="titulo">Qui</p>
							<p class="item_sessao">DDDDD</p>
							<p class="item_sessao">AAAAA</p>
							<p class="item_sessao">AAABBB</p>
							<p class="item_sessao">CCCCC</p>
						</aside>
						<aside>
							<p class="titulo">Sex</p>
							<p class="item_sessao">BBBBB</p>
							<p class="item_sessao">CCCCC</p>
						</aside>
					</section-->




					<section id="calendario">
						<aside>
							<p class="titulo">Hora</p>
							<p class="titulo">Seg</p>
							<p class="titulo">Ter</p>
							<p class="titulo">Qua</p>
							<p class="titulo">Qui</p>
							<p class="titulo">Sex</p>
						</aside>

						<!-- FAZER ESSE ESQUEMA E DEIXAR OS DIAS QUE NAO TIVEREM SESSAO VAZIOS MAS COM O P CRIADO!! -->
						<aside>
							<p class="horario">07:00</p>
							<p class="segunda"></p>
							<p class="terca"></p>
							<p class="quarta"></p>
							<p class="quinta"></p>
							<p class="sexta">BBBBBB</p>
						</aside>
						<aside>
							<p class="horario">08:00</p>
							<p class="item_sessao">AAAAA</p>
							<p class="item_sessao">AAABBB</p>
							<p class="item_sessao">CCCCCC</p>
						</aside>
						<aside>
							<p class="horario">09:00</p>
							<p class="item_sessao">AAAAA</p>
							<p class="item_sessao">AAABBB</p>
							<p class="item_sessao">CCCCCCC</p>
						</aside>
						<aside>
							<p class="item_sessao">DDDDD</p>
							<p class="item_sessao">AAAAA</p>
							<p class="item_sessao">AAABBB</p>
							<p class="item_sessao">CCCCC</p>
						</aside>
						<aside>
							<p class="item_sessao">BBBBB</p>
							<p class="item_sessao">CCCCC</p>
						</aside>
					</section>

						  	  
			</aside>

		</section>
	</body>
</html>
