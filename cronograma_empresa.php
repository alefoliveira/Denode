<?php
require 'config.php';
$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

session_start();//INICIO SESSAO
$nome = $_SESSION['NOME_PERFUSU'];
$idUsu = $_SESSION["ID_PERFUSU"];

echo "bem vindo ". $nome; //ALTERAR

$sqlUsu = "SELECT `TIPO_PERFUSU`, `ID_EMP` FROM `perfil_usuario` WHERE `ID_PERFUSU`=" . $idUsu; 
$queryUsu = mysql_query($sqlUsu, $conexao);
$resultUsu = mysql_fetch_array($queryUsu);

if ($resultUsu["TIPO_PERFUSU"] == 1) {
	echo 'Página não liberada';
} else {

	//DADOS SOBRE AS ATIVIDADES LIBERADAS PELA EMPRESA
	$sqlEmp = "SELECT `ATIVIDADES_ATIEMPPLA` from ATIVIDADES_EMPRESA_PLAT WHERE ID_EMP = " . $resultUsu["ID_EMP"];
	$queryEmp = mysql_query($sqlEmp, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
	$resultEmp = mysql_fetch_array($queryEmp);
	$registros = mysql_num_rows($queryEmp);
	$atividadesEmpresa = explode(",",$resultEmp[0]); //SEPARA ATIVIDADES MARCADAS PELA EMPRESA EM UM ARRAY PARA EXIBIR
	$registrosAtividades =  count($atividadesEmpresa); //CONTA QUANTOS ITENS TEM NO ARRAY
	$contElementos = $registrosAtividades-1; //REMOVE UM ITEM DO CONTADOR CONSIDERANDO QUE O ARRAY TEM O ITEM DE INDICE 0

	//SELECIONA ATIVIDADES PARA FAZER RELAÇÃO COM AQUELAS APROVADAS PELA EMPRESA
	$sql = "SELECT `ID_ATIPLA`, `TITULO_ATIPLA`, `COR_ATIPLA`, `DESCRICAO_ATIPLA`, `DURACAO_ATIPLA`, `MEMBRO_ATIPLA` FROM `ATIVIDADES_PLAT`"; 
	$query = mysql_query($sql, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
	$result = mysql_fetch_array($query);

	//DADOS SOBRE OS COLABORADORES
	$sqlColab = "SELECT `ID_PERFUSU`,`CPF_PERFUSU`, `NOME_PERFUSU`, `SOBRENOME_PERFUSU`FROM `perfil_usuario` WHERE `ID_EMP` = 1";
	$queryColab = mysql_query($sqlColab, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
	$registrosColab = mysql_num_rows($queryColab);

	$sqlColab2 = "SELECT `ID_PERFUSU`,`CPF_PERFUSU`, `NOME_PERFUSU`, `SOBRENOME_PERFUSU`FROM `perfil_usuario` WHERE `ID_EMP` = 1";
	$queryColab2 = mysql_query($sqlColab2, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
	$registrosColab2 = mysql_num_rows($queryColab2);


	//DADOS SESSOES
	$sqlSes = "SELECT `ID_CROEMPPLA`, `ATIVIDADES_CROEMPPLA`, `INICIO_CROEMPPLA`, `FIM_CROEMPPLA`, `PARTICIPANTES_CROEMPPLA`, `ATIVO_CROEMPPLA`, `DIAS_CROEMPPLA` FROM `cronograma_empresa_plat` WHERE `ID_EMP` = 1 ORDER BY `INICIO_CROEMPPLA`";
	$querySes = mysql_query($sqlSes, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
	$registrosSes = mysql_num_rows($querySes);



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

			<h1>CRONOGRAMA EMPRESA</h1>

			<a href="novo_cronograma_empresa.php">Nova Sessao</a>

			<table>

					<?php 
					if ($registrosSes) {

						$i = 0;

						while ($resultSes = mysql_fetch_array($querySes)) {

							$atividadesSes = explode(",",$resultSes['ATIVIDADES_CROEMPPLA']); //SEPARA AS ATIVIDADES SELECIONADAS PARA A SESSAO
							$registrosAtiSes =  count($atividadesSes); //CONTA QUANTOS ITENS TEM NO ARRAY

							echo '<tr>';

							for ($i=0; $i < $registrosAtiSes; $i++) { //EXIBE NOME DAS ATIVIDADES AO INVES DE ID
							
								$sqlAtiSes = 'SELECT `TITULO_ATIPLA` FROM `atividades_plat` WHERE `ID_ATIPLA` =' . $atividadesSes[$i];
								$queryAtiSes = mysql_query($sqlAtiSes, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS

								$totalAtiSes = mysql_result($queryAtiSes, 0, 'TITULO_ATIPLA');
								
								if ($i > 0 && $i < $registrosAtiSes) { echo '<td>, ' . $totalAtiSes . ' </td>';} else { echo '<td>' . $totalAtiSes . ' </td>';}
							}

							$participantesSes = explode(",",$resultSes['PARTICIPANTES_CROEMPPLA']); //SEPARA OS PARTICIPANTES SELECIONADOS PARA A SESSAO 
							$registrosPartSes =  count($participantesSes); 

							for ($iPart=0; $iPart < $registrosPartSes; $iPart++) { //EXIBE NOME DOS PARTICIPANTES AO INVES DO ID


								$sqlPartSes = 'SELECT `NOME_PERFUSU`, `SOBRENOME_PERFUSU` FROM `perfil_usuario` WHERE `ID_PERFUSU` =' . $participantesSes[$iPart];
								$queryPartSes = mysql_query($sqlPartSes, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS

								$nomePartSes = mysql_result($queryPartSes, 0, 'NOME_PERFUSU');
								
								if ($iPart> 0 && $iPart < $registrosPartSes) {
									echo '<td>, ' . $nomePartSes . '</td>';
								} else {
									echo '<td>' . $nomePartSes . '</td>';
								}
							}

							$diasSes = explode(",",$resultSes['DIAS_CROEMPPLA']); //SEPARA OS DIAS SELECIONADOS PARA A SESSAO 
							if (in_array(1, $diasSes)){ echo '<td>Segunda </td>'; }
							if (in_array(2, $diasSes)){ echo '<td>Terça </td>'; }
							if (in_array(3, $diasSes)){ echo '<td>Quarta </td>'; }
							if (in_array(4, $diasSes)){ echo '<td>Quinta </td>'; }
							if (in_array(5, $diasSes)){ echo '<td>Sexta</td>'; }

							if (in_array($localtime[6], $diasSes)){ //VERIFICA SE A SESSAO ACONTECERA NO DIA DE HOJE

								$inicioSes = explode(":",$resultSes['INICIO_CROEMPPLA']); //SEPARA A HORA DOS MINUTOS DO INICIO DA SESSAO
								
								


								if ($localtime[2] == $inicioSes[0] || $localtime[2] == $inicioSes[0]-1){ //VERIFICA SE O HORARIO ATUAL EH IGUAL AO HORARIO DA SESSAO OU SE EH 1H ANTES
									echo "\n sessao = " . ($inicioSes[0]);
									echo "\n localtime = " . $localtime[2];

									if ($localtime[1] == 45 || $inicioSes[1]-15 == $localtime[1]) {	//VERIFICA SE FALTAM 15 MINUTOS PARA A SESSAO COMECAR

										echo '<a href="confirma_sessao.php?ID_USU=1&ID_SESSAO='. $resultSes['ID_CROEMPPLA'] .'" target="blank">
											CONFIRMAR PARTICIPACAO
										</a>';
									}  else if ($localtime[1] == 55 || $inicioSes[1]-5 == $localtime[1]) { 

										$sqlConfSes = "SELECT `CONFIRMADOS_SESPLA` FROM `sessao_plat` WHERE `ID_CROEMPPLA` = ". $resultSes['ID_CROEMPPLA']; //SELECIONA TODOS OS COLABORADORES QUE CONFIRMARAM PRESENCA NA SESSAO
										$queryConfSes = mysql_query($sqlConfSes, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
										$resultConfSes = mysql_fetch_array($queryConfSes);

										$confirmadosSes = explode(",",$resultConfSes['CONFIRMADOS_SESPLA']); //COLOCA OS CONFIRMADOS EM UM ARRAY
										
										$adminSes = array_rand($confirmadosSes, 1); //SORTEIA UM INDICE ENTRE OS POSSIVEIS NO ARRAY DE CONFIRMADOS

										echo ' admin =' . $confirmadosSes[$adminSes]; //SELECIONA O CONFIRMADO SORTEADO NA VARIAVEL $adminSes

										echo '<a href="sessao.php?ID_SESSAO='. $resultSes['ID_CROEMPPLA'] .'" target="blank">
											ACESSAR SESSAO
										</a>'; //ENVIA LINK DA SESSAO PARA ADMIN
									}

								} else {
									echo '<td>LOCALTIME PORRAAA </td>';
								}
							}

							echo '
							<td>  ' . $resultSes['INICIO_CROEMPPLA'] . ' </td> 
							<td>' . $resultSes['FIM_CROEMPPLA'] . '</td>
							<td>' . $resultSes['ATIVO_CROEMPPLA'] . '</td>
							<td> 
								<a href="apoio/editar_cronograma_empresa.php?ID_CROEMPPLA='.$resultSes['ID_CROEMPPLA'].'" target="blank">
									Editar
								</a>
							</td>
							<td id="icon-center"> 
								<a href="apoio/excluir_cronograma_empresa.php?ID_CROEMPPLA='.$resultSes['ID_CROEMPPLA'].'">
									Excluir
								</a>
							</td>
							</tr>';

								

						}
					} ?>
		</body>

	</html>
<?php } ?>