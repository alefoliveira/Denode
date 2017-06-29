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

		<form name="selecao_atividades" action="apoio\insere_cronograma_empresa.php" method="post" enctype="multipart/form-data">

			<input type="hidden" name="cadastrar" value="1" />
			
			<table>
				<!-- SELEÇÃO DE ATIVIDADES -->
				<?php
				if ($registros) {
					$i = 0;
					$tempoTotal = 0;

					while ($result = mysql_fetch_array($query)) {
						if ($i <= $contElementos) {
							if ($result['ID_ATIPLA'] == $atividadesEmpresa[$i]) {
								echo '<tr>
									<!--td>  ' . $result['ID_ATIPLA'] . ' </td --> 
									<td>  ' . $result['TITULO_ATIPLA'] . ' </td> 
									<td>' . $result['DESCRICAO_ATIPLA'] . '</td>
									<td>  ' . $result['DURACAO_ATIPLA'] . ' </td>
									<td>
										<input type="checkbox" class="checkbox" id="'. $i . '" name="atividades[]" value="' . $result['ID_ATIPLA'] . '">
									</td>
								</tr>';
								$i++;
							}
						} else {
							$i++;
						}
						$tempoTotal += $result['DURACAO_ATIPLA'];
						$duracao[$i] = $result['DURACAO_ATIPLA'];
					}
				} else {
					//ALTERAR
					echo '<p>Nenhuma atividade disponivel no momento!</p>';
				} ?>
				<tr>
					<td>
						<label>Hora de Início</label>
						<input type="time" name="inicio" id="inicio">
					</td>
					<td>
						<label>Hora de Fim</label>
						<input type="time" name="termino" id="termino">
					</td>
					<td>
						<label>Ativo?</label>
						<input type="checkbox" name="ativo">
					</td>
				</tr>

				<!-- Exibe todos os colaboradores que possuem o membro da dor relativo às atividades selecionadas -->
				<tr>
					<td>Colaboradores Sugeridos</td>
				</tr>
				
				<!-- SELEÇÃO DE COLABORADORES -->
				<?php

				//DADOS SOBRE AS ATIVIDADES LIBERADAS PELA EMPRESA
				$sqlEmp = "SELECT `ATIVIDADES_ATIEMPPLA` from ATIVIDADES_EMPRESA_PLAT WHERE ID_EMP = 1"; //ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION
				$queryEmp = mysql_query($sqlEmp, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
				$resultEmp = mysql_fetch_array($queryEmp);
				$registros = mysql_num_rows($queryEmp);
				$atividadesEmpresa = explode(",",$resultEmp[0]); //SEPARA ATIVIDADES MARCADAS PELA EMPRESA EM UM ARRAY PARA EXIBIR
				$registrosAtividades =  count($atividadesEmpresa); //CONTA QUANTOS ITENS TEM NO ARRAY
				$contElementos = $registrosAtividades-1; //REMOVE UM ITEM DO CONTADOR CONSIDERANDO QUE O ARRAY TEM O ITEM DE INDICE 0

				$contAtiTotais = 0;

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
											<td>' . $resultColab['SOBRENOME_PERFUSU'] . '</td>
											<td>
												<input type="checkbox" class="checkbox" name="atividades[]" value="' . $resultColab['ID_PERFUSU'] . '">
											</td>
											<td>Sugestão</td>
										</tr>';
										$i++;
									} else { 
										echo '<tr>
											<td>  ' . $resultColab['NOME_PERFUSU'] . ' </td> 
											<td>' . $resultColab['SOBRENOME_PERFUSU'] . '</td>
											<td>
												<input type="checkbox" class="checkbox" name="atividades[]" value="' . $resultColab['ID_PERFUSU'] . '">
											</td>
										</tr>';
									}
							} else {
								echo 'o colaborador não possui dores';
							}
						} else {
							$i++;
						}
					}
				} else {
					//ALTERAR
					echo '<p>Nenhum colaborador cadastrado!</p>';
				} ?>
			</table>

			<input type="submit" value="Salvar Atividades">
		</form>
	</body>

	<script>
		$(document).ready(function(){
			
			var duracaoAtividades = 0;
			
			function pad (str, max) {//FUNÇÃO PARA AUXILIAR A TRANSFORMAR OS MINUTOS EM HORAS
			  str = str.toString();
			  return str.length < max ? pad("0" + str, max) : str;
			}
			//VARIÁVEIS
			var cont = 0;
			var tempoInicio;
			
			$('#inicio').focusout(function() {//FUNÇÃO PARA DEIXAR O CAMPO 'TÉRMINO' COM PREENCHIMENTO AUTOMÁTICO
				var horas = [];
				
				tempoInicio = $('#inicio').val(); 
				if (cont == 0){
					console.log('if 1');
					
					horas[cont] = $('#inicio').val();
					defineTermino();
					cont++;
				} else {
					
					console.log('if 2');
					horas[cont] = $('#inicio').val();
					
					console.log(horas[cont-1]);
					console.log(horas[cont]);
					if (horas[cont-1] != horas[cont]){
						console.log('if 3');
						defineTermino();
						cont++;
					} else {
						console.log('masquecaralha');
					}
				}
				
			});
			function defineTermino(){
				var horas  = 0;
				var tmpMin = 0;
			    var timeParts = tempoInicio.split(":");
			    horas = horas + parseInt(timeParts[0]);
			    var minutos =  parseInt(timeParts[1]);
			    minutos += duracaoAtividades;
				if (minutos >= 60){
				    tmpMin = Math.round(minutos / 60);
				    minutos = minutos % 60;
		   			minutos = pad(minutos, 2);
				}
				tmpMins = horas + parseInt(tmpMin);
		   		tmpMins = pad(tmpMins, 2);
				tempoTotal = tmpMins + ":" + minutos;
				$('#termino').val(tempoTotal);
			}
			$('.checkbox').click(function(){
				var idCheckbox = parseInt($(this).attr('id')); //PEGA O ID DO CHECKBOX CLICADO E TRANSFORMA EM NÚMERO (INT)
 
				idCheckbox += 1; //SOMA 1 POIS OS ID DO JSON (abaixo) INICIAM EM 1
				var thePacket = <?php echo json_encode($duracao) ?>; //Transforma a variável $duracao do PHP em arquivo JSON
				var duracao = parseInt(thePacket[idCheckbox]);  //ATRIBUI A DURAÇÃO (THEPACKET) DO ITEM CLICADO (IDCHECKBOX) A UMA VARIAVEL
				if($(this).is(":checked")){ 
					duracaoAtividades += duracao; //ADICIONA A DURAÇÃO DO ITEM CLICADO
				} else {
					duracaoAtividades -= duracao; //REMOVE A DURAÇÃO DO ITEM CLICADO
				}
				return duracaoAtividades;
				defineTermino();
				//TESTES
				console.log(idCheckbox);
				console.log(duracao);
				console.log(minutos);
			});
		});
	</script>

</html>