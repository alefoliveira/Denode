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

	if ($resultUsu["TIPO_PERFUSU"] == 2) {
		echo 'Página não liberada';
	} else {


		$sql = "SELECT `ID_ATIPLA`, `TITULO_ATIPLA`, `COR_ATIPLA`, `DESCRICAO_ATIPLA`, `DURACAO_ATIPLA` FROM `ATIVIDADES_PLAT` ORDER BY `ID_ATIPLA`"; 
		$query = mysql_query($sql, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
		$registros = mysql_num_rows($query); //CONTADOR DE RESULTADOS TRAZIDOS DO BANCO DE DADOS

		$sqlEmp = "SELECT `ATIVIDADES_ATIEMPPLA`, `PONTOS_ATIEMPPLA` from ATIVIDADES_EMPRESA_PLAT WHERE ID_EMP = " . $resultUsu["ID_EMP"];

		$queryEmp = mysql_query($sqlEmp, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
		$resultEmp = mysql_fetch_array($queryEmp);

		$atividadesEmpresa = explode(",",$resultEmp[0]); //SEPARA ATIVIDADES MARCADAS PELA EMPRESA EM UM ARRAY PARA MARCAR OS CHECKBOXES
		$registrosAtividades =  count($atividadesEmpresa); //CONTA QUANTOS ITENS TEM NO ARRAY
		$contElementos = $registrosAtividades-1; //REMOVE UM ITEM DO CONTADOR CONSIDERANDO QUE O ARRAY TEM O ITEM DE INDICE 0

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

			</head>

			<body>

				<h1>ATIVIDADES DISPONÍVEIS</h1>

				<form name="selecao_atividades" action="apoio\insere_atividades_selecionadas.php" method="post" enctype="multipart/form-data">

					<input type="hidden" name="cadastrar" value="1" />
					
					<table>
						<?php
						if ($registros) {

							$i = 0;

							while ($result = mysql_fetch_array($query)) {

								echo '<tr>
									<!--td>  ' . $result['ID_ATIPLA'] . ' </td --> 
									<td>  ' . $result['TITULO_ATIPLA'] . ' </td> 
									<td>' . $result['DESCRICAO_ATIPLA'] . '</td>
									<td>  ' . $result['DURACAO_ATIPLA'] . ' </td>
									<td>';
								
								if ($i <= $contElementos) {
									if ($result['ID_ATIPLA'] == $atividadesEmpresa[$i]) {
										
										echo ' <input type="checkbox" class="checkbox" name="atividades[]" checked id="' . $result['ID_ATIPLA'] . '" value="' . $result['ID_ATIPLA'] . '">
											</td>
											<td><input type="text" class="pontosAti" name="pontos[]" id="input' . $result['ID_ATIPLA'] . '" placeholder="Pontos" /></td>
										</tr>';
										$i++;

									} else {
										echo ' <input type="checkbox" class="checkbox" name="atividades[]" id="' . $result['ID_ATIPLA'] . '" value="' . $result['ID_ATIPLA'] . '">
											</td>
											<td><input type="text" class="pontosAti" name="pontos[]" id="input' . $result['ID_ATIPLA'] . '" placeholder="Pontos" disabled /></td>
										</tr>';
									}
								} else {
									echo ' <input type="checkbox" class="checkbox" name="atividades[]" id="' . $result['ID_ATIPLA'] . '" value="' . $result['ID_ATIPLA'] . '">
										</td>
										<td><input type="text" class="pontosAti" name="pontos[]" id="input' . $result['ID_ATIPLA'] . '" placeholder="Pontos" disabled /></td>
									</tr>';
									$i++;
								}

							}
						} else {
							//ALTERAR
							echo '<p>Nenhuma atividade disponivel no momento!</p>';
						} ?>
					</table>

					<input type="submit" value="Salvar Atividades">
				</form>

			</body>


			<script>
				$(document).ready(function(){
					$('.checkbox').click(function(){
						var idCheckbox = parseInt($(this).attr('id')); //PEGA O ID DO CHECKBOX CLICADO E TRANSFORMA EM NÚMERO (INT)
						if ($(this).is(':checked')){
							$('#input' + idCheckbox).removeAttr("disabled");
						} else {
							$('#input' + idCheckbox).attr("disabled","disabled");
						}
					});
				});
			</script>

		</html>
	<?php } ?>