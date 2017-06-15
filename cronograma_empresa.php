<?php
require 'config.php';

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

$sqlEmp = "SELECT `ATIVIDADES_ATIEMPPLA` from ATIVIDADES_EMPRESA_PLAT WHERE ID_EMP = 1"; //ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION

$queryEmp = mysql_query($sqlEmp, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
$resultEmp = mysql_fetch_array($queryEmp);
$registros = mysql_num_rows($queryEmp);

$atividadesEmpresa = explode(",",$resultEmp[0]); //SEPARA ATIVIDADES MARCADAS PELA EMPRESA EM UM ARRAY PARA MARCAR OS CHECKBOXES
$registrosAtividades =  count($atividadesEmpresa); //CONTA QUANTOS ITENS TEM NO ARRAY
$contElementos = $registrosAtividades-1; //REMOVE UM ITEM DO CONTADOR CONSIDERANDO QUE O ARRAY TEM O ITEM DE INDICE 0

$sql = "SELECT `ID_ATIPLA`, `TITULO_ATIPLA`, `COR_ATIPLA`, `DESCRICAO_ATIPLA`, `DURACAO_ATIPLA` FROM `ATIVIDADES_PLAT`"; 
$query = mysql_query($sql, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS

$result = mysql_fetch_array($query);

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

		<h1>CRONOGRAMA EMPRESA</h1>

		<form name="selecao_atividades" action="apoio\insere_cronograma_empresa.php" method="post" enctype="multipart/form-data">

			<input type="hidden" name="cadastrar" value="1" />
			
			<table>
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
									<td class="duracao" value="' . $result['DURACAO_ATIPLA'] . '">  ' . $result['DURACAO_ATIPLA'] . ' </td>
									<td>
										<input type="checkbox" class="checkbox" name="atividades[]" value="' . $result['ID_ATIPLA'] . '">
									</td>
								</tr>
								</tr>';
								$i++;
							}
						} else {
							$i++;
						}
						$tempoTotal += $result['DURACAO_ATIPLA'];
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
				</tr>
			</table>

			<input type="submit" value="Salvar Atividades">
		</form>
	</body>

	<script>

		var minutos = 0;
		$(document).ready(function(){
			
			function pad (str, max) {
			  str = str.toString();
			  return str.length < max ? pad("0" + str, max) : str;
			}

			var cont = 0;
			var tempoInicio;
			
			$('#inicio').focusout(function() {
				var horas = [];
				
				tempoInicio = $('#inicio').val(); 
				if (cont == 0){
					console.log('if 1');
					
					horas[cont] = $('#inicio').val();
					defineTermino();
					cont++;

				} else {
					
					horas[cont] = $('#inicio').val();
					
					console.log(horas[cont-1]);
					console.log(horas[cont]);

					if (horas[cont-1] != horas[cont]){
						console.log('if 2');
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
			    minutos = minutos + parseInt(timeParts[1]);

			    minutos += <?php echo $tempoTotal; ?>;

				if (minutos >= 60){
				    tmpMin = Math.round(minutos / 60);
				    minutos = minutos % 60;
		   			minutos = pad(minutos, 2);
				}

				tmpMins = horas + parseInt(tmpMin);
		   		tmpMins = pad(tmpMins, 2);
				tempoTotal = tmpMins + ":" + minutos;

				console.log(tempoTotal);

				$('#termino').val(tempoTotal);
			}

		});

			$('.checkbox').click(function(){
				minutos += $('.duracao').val();
			});


	</script>

</html>
