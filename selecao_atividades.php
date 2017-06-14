<?php
require 'config.php';

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

$sql = "SELECT `ID_ATIPLA`, `TITULO_ATIPLA`, `COR_ATIPLA`, `DESCRICAO_ATIPLA`, `DURACAO_ATIPLA`, `ID_EMP` FROM `ATIVIDADES_PLAT` ORDER BY `ID_ATIPLA` DESC";

$query = mysql_query($sql, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
$registros = mysql_num_rows($query); //CONTADOR DE RESULTADOS TRAZIDOS DO BANCO DE DADOS
 
 echo $registros;

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

						while ($result = mysql_fetch_array($query)) {

						echo '<tr>
							<td>  ' . $result['ID_ATIPLA'] . ' </td> 
							<td>  ' . $result['TITULO_ATIPLA'] . ' </td> 
							<td>' . $result['DESCRICAO_ATIPLA'] . '</td>
							<td>  ' . $result['DURACAO_ATIPLA'] . ' </td>
							<td>
								<input type="checkbox" name="atividades[]" value="' . $result['ID_ATIPLA'] . '">
							</td>
						</tr>';

						}
					}
					else {

						//ALTERAR
						echo '<p>Nenhuma atividade disponivel no momento!</p>';
					} ?>
				</table>

				<input type="submit" value="Salvar Atividades">
			</form>

	</body>

</html>
