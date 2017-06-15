<?php
require 'config.php';

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);


$sql = "SELECT `ID_ATIPLA`, `TITULO_ATIPLA`, `COR_ATIPLA`, `DESCRICAO_ATIPLA`, `DURACAO_ATIPLA` FROM `ATIVIDADES_PLAT` ORDER BY `ID_ATIPLA`"; 
$query = mysql_query($sql, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
$registros = mysql_num_rows($query); //CONTADOR DE RESULTADOS TRAZIDOS DO BANCO DE DADOS

$sqlEmp = "SELECT `ATIVIDADES_ATIEMPPLA` from ATIVIDADES_EMPRESA_PLAT WHERE ID_EMP = 1"; //ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION

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
								
								echo ' <input type="checkbox" name="atividades[]" checked value="' . $result['ID_ATIPLA'] . '">
									</td>
								</tr>';
								$i++;

							} else {
								echo ' <input type="checkbox" name="atividades[]" value="' . $result['ID_ATIPLA'] . '">
									</td>
								</tr>';
							}
						} else {
							echo ' <input type="checkbox" name="atividades[]" value="' . $result['ID_ATIPLA'] . '">
								</td>
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

</html>
