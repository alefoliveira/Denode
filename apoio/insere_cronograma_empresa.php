
<?php

require '../config.php';

//INSERE ATIVIDADES SELECIONADAS NO BANCO
if (isset($_POST['cadastrar'])) {

	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_select_db($banco);
	/*
	$inicioCro = "SELECT `INICIO_CROEMPPLA` from CRONOGRAMA_EMPRESA_PLAT WHERE ID_EMP = 1"; //SELECIONA AS HORAS DE INICIO PARA VER SE ESTA REPETIDO
	$queryInicioCro = mysql_query($inicioCro, $conexao);
	$registrosInicioCro = mysql_num_rows($queryInicioCro);
*/

	
	if(isset($_POST['atividades'])){
		 		 
	 	$listaAtividadesCro = $_POST['atividades'];
	 	$atividadesSelecionadas = implode(",",$listaAtividadesCro);
	 	$listaDiasCro = $_POST['dias'];
	 	$diasSelecionados = implode(",",$listaDiasCro);
	 	$listaColabCro = $_POST['colaboradores'];
	 	$colabSelecionados = implode(",",$listaColabCro);
	 	
	 	if (!isset($_POST['ativo'])){$ativo = 0;} else {
		 	$listaAtivos = $_POST['ativo'];
		 	$ativo = implode(",",$listaAtivos);
	 	}
		
		$sqlAtiCro = "INSERT INTO `cronograma_empresa_plat`(`ID_EMP`, `ATIVIDADES_CROEMPPLA`, `INICIO_CROEMPPLA`, `FIM_CROEMPPLA`, `PARTICIPANTES_CROEMPPLA`, `ATIVO_CROEMPPLA`, `DIAS_CROEMPPLA`) VALUES (1,'". $atividadesSelecionadas . "','" . $_POST['inicio'] . "','" . $_POST['termino'] . "','". $colabSelecionados . "', " . $ativo . ",'" . $diasSelecionados . "')";//ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION

		echo $sqlAtiCro;

		$queryAtiCro = mysql_query($sqlAtiCro, $conexao);
		//header("Location: ../cronograma_empresa.php"); /* REDIRECIONA USUARIO PARA MESMA PAGINA DE SELECAO */

	} else {
		echo 'Voce nao selecionou nenhuma atividade ';
	}
	

}



?>