<?php

require '../config.php';

//INSERE ATIVIDADES SELECIONADAS NO BANCO
if (isset($_POST['cadastrar'])) {

	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_select_db($banco);
	$atividadesCro = "SELECT `ATIVIDADES_CROEMPPLA`, `ID_EMP`, `INICIO_CROEMPPLA`, `FIM_CROEMPPLA` from CRONOGRAMA_EMPRESA_PLAT WHERE ID_EMP = 1"; //ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION
	$queryAtiCro = mysql_query($atividadesCro, $conexao);
	$registros = mysql_num_rows($queryAtiCro);

	
	if(isset($_POST['atividades'])){
		 		 
	 	$listaatividadesCro = $_POST['atividades'];
	 	$atividadesSelecionadas = implode(",",$listaatividadesCro);
	    
	    if($registros != "0"){
			$sqlAtiCro = "UPDATE `CRONOGRAMA_EMPRESA_PLAT` SET `ATIVIDADES_CROEMPPLA`='" . $atividadesSelecionadas . "',`INICIO_CROEMPPLA`='" . $_POST['inicio'] . "',`FIM_CROEMPPLA`='" . $_POST['termino'] . ",`ATIVO_CROEMPPLA`='" . $_POST['ativo'] . " WHERE `ID_EMP` = 1"; //ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION
			//,`PARTICIPANTES_CROEMPPLA`='" . $atividadesSelecionadas . "
		} else {
			$sqlAtiCro = "INSERT INTO CRONOGRAMA_EMPRESA_PLAT (`ATIVIDADES_CROEMPPLA`, `INICIO_CROEMPPLA`, `FIM_CROEMPPLA`, `ATIVO_CROEMPPLA`) VALUES ('". $atividadesSelecionadas . "','" . $_POST['inicio'] . "','" . $_POST['termino'] . "', " . $_POST['ativo'] . ")";//ALTERAR PARA COLOCAR ID DA EMPRESA TRAZIDO NA SESSION

		}	

		$queryAtiCro = mysql_query($sqlAtiCro, $conexao);
		header("Location: ../cronograma_empresa.php"); /* REDIRECIONA USUARIO PARA MESMA PAGINA DE SELECAO */

	} else {
		echo 'Voce nao selecionou nenhuma atividade ';
	}
	

}
?>