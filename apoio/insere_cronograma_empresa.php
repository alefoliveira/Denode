<<<<<<< HEAD
<?php

require '../config.php';

//INSERE ATIVIDADES SELECIONADAS NO BANCO
if (isset($_POST['cadastrar'])) {

	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_select_db($banco);
	$atividadesCro = "SELECT `ID_EMP` from CRONOGRAMA_EMPRESA_PLAT WHERE ID_EMP = 1"; //ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION
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
			$sqlAtiCro = "INSERT INTO `cronograma_empresa_plat`(`ID_EMP`, `ATIVIDADES_CROEMPPLA`, `INICIO_CROEMPPLA`, `FIM_CROEMPPLA`, `PARTICIPANTES_CROEMPPLA`, `ATIVO_CROEMPPLA`, `DIAS_CROEMPPLA`) VALUES (1,'". $atividadesSelecionadas . "','" . $_POST['inicio'] . "','" . $_POST['termino'] . "','". $colabSelecionados . "', " . $ativo . ",'" . $diasSelecionados . "')";//ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION

			echo $sqlAtiCro;

		/*}*/	

		$queryAtiCro = mysql_query($sqlAtiCro, $conexao);
		//header("Location: ../cronograma_empresa.php"); /* REDIRECIONA USUARIO PARA MESMA PAGINA DE SELECAO */

	} else {
		echo 'Voce nao selecionou nenhuma atividade ';
	}
	

}
=======
<?php

require '../config.php';

//INSERE ATIVIDADES SELECIONADAS NO BANCO
if (isset($_POST['cadastrar'])) {

	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_select_db($banco);
	$atividadesCro = "SELECT `ID_EMP` from CRONOGRAMA_EMPRESA_PLAT WHERE ID_EMP = 1"; //ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION
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
			$sqlAtiCro = "INSERT INTO `cronograma_empresa_plat`(`ID_EMP`, `ATIVIDADES_CROEMPPLA`, `INICIO_CROEMPPLA`, `FIM_CROEMPPLA`, `PARTICIPANTES_CROEMPPLA`, `ATIVO_CROEMPPLA`, `DIAS_CROEMPPLA`) VALUES (1,'". $atividadesSelecionadas . "','" . $_POST['inicio'] . "','" . $_POST['termino'] . "','". $colabSelecionados . "', " . $ativo . ",'" . $diasSelecionados . "')";//ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION

			echo $sqlAtiCro;

		/*}*/	

		$queryAtiCro = mysql_query($sqlAtiCro, $conexao);
		//header("Location: ../cronograma_empresa.php"); /* REDIRECIONA USUARIO PARA MESMA PAGINA DE SELECAO */

	} else {
		echo 'Voce nao selecionou nenhuma atividade ';
	}
	

}
>>>>>>> 3e9e4204b21370ec3d81ce43ecd747782446ac66
?>