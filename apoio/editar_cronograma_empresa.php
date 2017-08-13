<?php
require '../config.php';

session_start();//INICIO SESSAO
$idUsu = $_SESSION["ID_PERFUSU"];
$sqlUsu = "SELECT `ID_EMP` FROM `perfil_usuario` WHERE `ID_PERFUSU`=" . $idUsu; 
$queryUsu = mysql_query($sqlUsu, $conexao);
$resultUsu = mysql_fetch_array($queryUsu);

if (!isset($_GET['ID_CROEMPPLA'])) {
    echo('Postagem não existente ( <a href="../cronograma_empresa.php">TESTE</a> )');
}
$conexaoCroEspec = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

$ID_CROEMPPLA = (int) $_GET['ID_CROEMPPLA'];

$sqlCroEspec = 'select * from `cronograma_empresa_plat` where ID_CROEMPPLA = ' . $ID_CROEMPPLA;
$queryCroEspec = mysql_query($sqlCroEspec, $conexaoCroEspec);
$resultCroEspec = mysql_fetch_array($queryCroEspec);

$atividadesCroEspec = explode(",",$resultCroEspec['ATIVIDADES_CROEMPPLA']); //SEPARA ATIVIDADES MARCADAS PELA EMPRESA EM UM ARRAY PARA MARCAR OS CHECKBOXES
$registrosAtiCroEspec =  count($atividadesCroEspec); //CONTA QUANTOS ITENS TEM NO ARRAY
$contElementosCroEspec = $registrosAtiCroEspec-1; //REMOVE UM ITEM DO CONTADOR CONSIDERANDO QUE O ARRAY TEM O ITEM DE INDICE 0


$diasCroEspec = explode(",",$resultCroEspec['DIAS_CROEMPPLA']);
$participantesCroEspec = explode(",",$resultCroEspec['PARTICIPANTES_CROEMPPLA']);

$registrosCroEspec = mysql_num_rows($queryCroEspec);

mysql_close($conexaoCroEspec);


$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

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

		<form name="selecao_atividades" action="atualizar_cronograma_empresa.php?ID_CROEMPPLA=<?php echo $ID_CROEMPPLA; ?>" method="post" enctype="multipart/form-data">

			<input type="hidden" name="cadastrar" value="1" />
			
			<table>
				<!-- SELEÇÃO DE ATIVIDADES -->
				<?php
				if ($registrosCroEspec) {
					$i = 0;	
					while ($result = mysql_fetch_array($query)) {
						if ($i <= $contElementos) {

							echo '<tr>
									<!--td>  ' . $result['ID_ATIPLA'] . ' </td --> 
									<td>  ' . $result['TITULO_ATIPLA'] . ' </td> 
									<td>' . $result['DESCRICAO_ATIPLA'] . '</td>
									<td>  ' . $result['DURACAO_ATIPLA'] . ' </td>';

							if (isset($atividadesCroEspec[$i])){
								if ($result['ID_ATIPLA'] == $atividadesCroEspec[$i]) {
									echo '<td>
											<input type="checkbox" checked class="checkbox" id="'. $i . '" name="atividades[]" value="' . $result['ID_ATIPLA'] . '">
										</td>
									</tr>';
									$i++;
								} else {
									echo '<td>
											<input type="checkbox" class="checkbox" id="'. $i . '" name="atividades[]" value="' . $result['ID_ATIPLA'] . '">
										</td>
									</tr>';
								} 
							}	else {
								echo '<td>
										<input type="checkbox" class="checkbox" id="'. $i . '" name="atividades[]" value="' . $result['ID_ATIPLA'] . '">
									</td>
								</tr>';
							}
						} else { $i++; }
						$duracao[$i] = $result['DURACAO_ATIPLA'];
					}
				} else {echo '<p>Nenhuma atividade disponivel no momento!</p>'; } //ALTERAR
			?>

			<tr>
					<td>
						<label>Hora de Início</label>
						<input type="time" name="inicio" id="inicio" value="<?php echo $resultCroEspec['INICIO_CROEMPPLA']?>">
					</td>
					<td>
						<label>Hora de Fim</label>
						<input type="time" name="termino" id="termino" value="<?php echo $resultCroEspec['FIM_CROEMPPLA']?>">
					</td>
					<td>
						<label>Ativo?</label>
						<?php
							if ($resultCroEspec['ATIVO_CROEMPPLA'] == 1) { echo '<input type="checkbox" checked name="ativo[]" value="1">';}
							else {echo '<input type="checkbox" name="ativo[]" value="1">';}
						?>
					</td>
					
				</tr>
				<tr>
					<td>
						<label>Segunda</label>
						<?php 
							if (in_array(1,  $diasCroEspec)) { echo '<input type="checkbox" checked name="dias[]" value = "1">'; } 
							else { echo '<input type="checkbox" name="dias[]" value = "1">'; }
						?>
					</td>
					<td>
						<label>Terca</label>
						<?php 
							if (in_array(2,  $diasCroEspec)) { echo '<input type="checkbox" checked name="dias[]" value = "2">'; } 
							else { echo '<input type="checkbox" name="dias[]" value = "2">'; }
						?>
					</td>
					<td>
						<label>Quarta</label>
						<?php 
							if (in_array(3,  $diasCroEspec)) { echo '<input type="checkbox" checked name="dias[]" value = "3">'; } 
							else { echo '<input type="checkbox" name="dias[]" value = "3">'; }
						?>
					</td>
					<td>
						<label>Quinta</label>
						<?php 
							if (in_array(4,  $diasCroEspec)) { echo '<input type="checkbox" checked name="dias[]" value = "4">'; } 
							else { echo '<input type="checkbox" name="dias[]" value = "4">'; }
						?>
					</td>
					<td>
						<label>Sexta</label>
						<?php 
							if (in_array(5,  $diasCroEspec)) { echo '<input type="checkbox" checked name="dias[]" value = "5">'; } 
							else { echo '<input type="checkbox" name="dias[]" value = "5">'; }
						?>
					</td>
				</tr>
				<!-- Exibe todos os colaboradores que possuem o membro da dor relativo às atividades selecionadas -->
				<tr>
					<td><h3>Colaboradores Sugeridos<h3></td>
				</tr>
				
				<!-- COLABORADORES SUGERIDOS-->
				<?php

				//DADOS SOBRE AS ATIVIDADES LIBERADAS PELA EMPRESA
				$sqlEmp = "SELECT `ATIVIDADES_ATIEMPPLA` from ATIVIDADES_EMPRESA_PLAT WHERE ID_EMP = " . $resultUsu["ID_EMP"]; 
				$queryEmp = mysql_query($sqlEmp, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
				$resultEmp = mysql_fetch_array($queryEmp);
				$registros = mysql_num_rows($queryEmp);
				$atividadesEmpresa = explode(",",$resultEmp[0]); //SEPARA ATIVIDADES MARCADAS PELA EMPRESA EM UM ARRAY PARA EXIBIR
				$registrosAtividades =  count($atividadesEmpresa); //CONTA QUANTOS ITENS TEM NO ARRAY
				$contElementos = $registrosAtividades-1; //REMOVE UM ITEM DO CONTADOR CONSIDERANDO QUE O ARRAY TEM O ITEM DE INDICE 0

				if ($registrosColab && $registros) {//Verifica se tem colaboradores cadastrados
					
					$i = 0;

					$sql = "SELECT `MEMBRO_ATIPLA` FROM `ATIVIDADES_PLAT`"; 
					$query = mysql_query($sql, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
					$result = mysql_fetch_array($query);

					while ($resultColab = mysql_fetch_array($queryColab)) {	//Enquanto tiverem colaboradores cadastrados, associe-os a um array (+/- isso)

						$sqlMembro = "SELECT `MEMBRO_PERFDOR` FROM `perfil_dor` WHERE `ID_PERFUSU` = " . $resultColab['ID_PERFUSU']; 
						$queryMembro = mysql_query($sqlMembro, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
						$resultMembro = mysql_fetch_array($queryMembro);

						if ($i <= $registrosColab) {
						
							$membrosColab = explode(",",$resultMembro['MEMBRO_PERFDOR']); //SEPARA OS MEMBROS QUE O COLABORADOR ESPECIFICO SENTE DOR EM UM ARRAY 
							$registrosMemColab =  count($membrosColab); //CONTA QUANTOS ITENS TEM NO ARRAY
							
							if($registrosMemColab != 0) {//VERIFICA SE TEM ALGUM MEMBRO SALVO NO BD

									$membrosAtiPla = mysql_result($query, $i, 'MEMBRO_ATIPLA');//SUBSTITUI WHILE PARA GERAR O RESULT, ASSIM, VAI BUSCANDO NA QUERY DAS ATIVIDADES CADA UM DOS MEMBROS MARCADOS LA DE ACORDO COM O VALOR DO $i

									if (in_array($membrosAtiPla,  $membrosColab)) {//VERIFICA SE O VALOR ATUAL DO RESULT ESTA ESTE OS MEMBROS SELECIONADOS PELO COLABORADOR
										echo '<tr>
											<td>  ' . $resultColab['NOME_PERFUSU'] . ' </td> 
											<td>' . $resultColab['SOBRENOME_PERFUSU'] . '</td>';

										if (in_array($resultColab['ID_PERFUSU'], $participantesCroEspec)) { 
											echo '<td>
													<input type="checkbox" class="checkbox" checked name="colaboradores[]" value="' . $resultColab['ID_PERFUSU'] . '">
												</td>';
										} else {
											echo '<td>
													<input type="checkbox" class="checkbox" name="colaboradores[]" value="' . $resultColab['ID_PERFUSU'] . '">
												</td>';
										}

										echo '
												<td>Sugestão</td>
											</tr>';
										$i++;
									}
							} else { echo 'o colaborador não possui dores'; }//ALTERAR
						} else { $i++; }
					}
				} else { echo '<p>Nenhum colaborador cadastrado!</p>';}//ALTERAR

				//DEMAIS COLABORADORES

				//DADOS SOBRE AS ATIVIDADES LIBERADAS PELA EMPRESA
				$sqlEmp2 = "SELECT `ATIVIDADES_ATIEMPPLA` from ATIVIDADES_EMPRESA_PLAT WHERE ID_EMP = " . $resultUsu["ID_EMP"]; 
				$queryEmp2 = mysql_query($sqlEmp2, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
				$resultEmp2 = mysql_fetch_array($queryEmp2);
				$registros2 = mysql_num_rows($queryEmp2);
				$atividadesEmpresa2 = explode(",",$resultEmp2[0]); //SEPARA ATIVIDADES MARCADAS PELA EMPRESA EM UM ARRAY PARA EXIBIR
				$registrosAtividades2 =  count($atividadesEmpresa2); //CONTA QUANTOS ITENS TEM NO ARRAY
				$contElementos2 = $registrosAtividades2-1; //REMOVE UM ITEM DO CONTADOR CONSIDERANDO QUE O ARRAY TEM O ITEM DE INDICE 0

				if ($registrosColab2 && $registros2) {//Verifica se tem colaboradores cadastrados
					
					$i2 = 0;

					$sql2 = "SELECT `MEMBRO_ATIPLA` FROM `ATIVIDADES_PLAT`"; 
					$query2 = mysql_query($sql2, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
					$result2 = mysql_fetch_array($query2);

					while ($resultColab2 = mysql_fetch_array($queryColab2)) {	//Enquanto tiverem colaboradores cadastrados, associe-os a um array (+/- isso)

						$sqlMembro2 = "SELECT `MEMBRO_PERFDOR` FROM `perfil_dor` WHERE `ID_PERFUSU` = " . $resultColab2['ID_PERFUSU']; 
						$queryMembro2= mysql_query($sqlMembro2, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
						$resultMembro2 = mysql_fetch_array($queryMembro2);

						if ($i2 <= $registrosColab2) {
						
							$membrosColab2 = explode(",",$resultMembro2['MEMBRO_PERFDOR']); //SEPARA OS MEMBROS QUE O COLABORADOR ESPECIFICO SENTE DOR EM UM ARRAY 
							$registrosMemColab2 =  count($membrosColab2); //CONTA QUANTOS ITENS TEM NO ARRAY

							if($registrosMemColab2 != 0) {//VERIFICA SE TEM ALGUM MEMBRO SALVO NO BD

									$membrosAtiPla2 = mysql_result($query2, $i2, 'MEMBRO_ATIPLA');//SUBSTITUI WHILE PARA GERAR O RESULT, ASSIM, VAI BUSCANDO NA QUERY DAS ATIVIDADES CADA UM DOS MEMBROS MARCADOS LA DE ACORDO COM O VALOR DO $i

									if (!in_array($membrosAtiPla2,  $membrosColab2)) {//VERIFICA SE O VALOR ATUAL DO RESULT ESTA ESTE OS MEMBROS SELECIONADOS PELO COLABORADOR
										echo '<tr>
											<td>  ' . $resultColab2['NOME_PERFUSU'] . ' </td> 
											<td>' . $resultColab2['SOBRENOME_PERFUSU'] . '</td>';
										
										if (in_array($resultColab2['ID_PERFUSU'], $participantesCroEspec)) { 
											echo '<td>
													<input type="checkbox" class="checkbox" checked name="colaboradores[]" value="' . $resultColab['ID_PERFUSU'] . '">
												</td>';
										} else {
											echo '<td>
													<input type="checkbox" class="checkbox" name="colaboradores[]" value="' . $resultColab['ID_PERFUSU'] . '">
												</td>';
										}

										echo '</tr>';
										$i2++;
									}
							} else { echo 'o colaborador não possui dores';	}//ALTERAR
						} else { $i2++; }
					}
				} else { echo '<p>Nenhum colaborador cadastrado!</p>'; }//ALTERAR
			?>
			</table>
			<input type="submit" value="Salvar Atividades">
		</form>

		
	</body>
</html>