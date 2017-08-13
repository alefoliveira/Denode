
<?php

require '../config.php';

$ID_CROEMPPLA = (int) $_GET['ID_CROEMPPLA'];

//INSERE ATIVIDADES SELECIONADAS NO BANCO
if (isset($_POST['cadastrar'])) {

	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_select_db($banco);
	$atividadesCro = "SELECT `ID_EMP` from CRONOGRAMA_EMPRESA_PLAT WHERE ID_EMP = " . $resultUsu["ID_EMP"];
	$queryAtiCro = mysql_query($atividadesCro, $conexao);
	$registros = mysql_num_rows($queryAtiCro);

	
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

	 	echo $colabSelecionados;
	    
	   /* if($registros != "0"){
			
	    	echo 'tem registros';
			$sqlAtiCro = "UPDATE `CRONOGRAMA_EMPRESA_PLAT` SET `ATIVIDADES_CROEMPPLA`='" . $atividadesSelecionadas . "',`INICIO_CROEMPPLA`='" . $_POST['inicio'] . "',`FIM_CROEMPPLA`='" . $_POST['termino'] . ",`ATIVO_CROEMPPLA`='" . $_POST['ativo'] . ",`PARTICIPANTES_CROEMPPLA`='". $colabSelecionados . "',`DIAS_CROEMPPLA`='" . $diasSelecionados . "' WHERE `ID_EMP` = 1"; //ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION
			//,`PARTICIPANTES_CROEMPPLA`='" . $atividadesSelecionadas . "
		} else {
*/
			$sqlAtiCro = "UPDATE `cronograma_empresa_plat` SET `ATIVIDADES_CROEMPPLA`= '". $atividadesSelecionadas . "',`INICIO_CROEMPPLA`='" . $_POST['inicio'] . "',`FIM_CROEMPPLA`='" . $_POST['termino'] . "',`PARTICIPANTES_CROEMPPLA`='". $colabSelecionados . "', `ATIVO_CROEMPPLA`= " . $ativo . ",`DIAS_CROEMPPLA`='" . $diasSelecionados . "' WHERE `ID_CROEMPPLA` =" . $ID_CROEMPPLA;

		/*}*/	

		$queryAtiCro = mysql_query($sqlAtiCro, $conexao);
		header("Location: ../cronograma_empresa.php"); /* REDIRECIONA USUARIO PARA MESMA PAGINA DE SELECAO */

	} else {
		echo 'Voce nao selecionou nenhuma atividade ';
	}
	

}



?>