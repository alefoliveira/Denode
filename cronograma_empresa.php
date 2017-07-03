<?php
require 'config.php';
$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

//DADOS SOBRE AS ATIVIDADES LIBERADAS PELA EMPRESA
$sqlEmp = "SELECT `ATIVIDADES_ATIEMPPLA` from ATIVIDADES_EMPRESA_PLAT WHERE ID_EMP = 1"; //ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION
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

						if (in_array($localtime[6], $diasSes)){ 

							$inicioSes = explode(":",$resultSes['INICIO_CROEMPPLA']);

							if ($localtime[2] <= $inicioSes[0]){
								if ($localtime[1]-1 <= $inicioSes[1]) {
									echo '<a href="sessao_cronograma_empresa.php?ID_SESSAO=' . $resultSes['ID_CROEMPPLA'] . '" target="blank">Acessar Sessao</a>'; 
								}

							} else {
								echo '<td>LOCALTIME PORRAAA </td>';
							}
						}
							

					}
				} ?>
	</body>

</html>