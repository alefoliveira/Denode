<?php

require '../config.php';

session_start();//INICIO SESSAO
$idUsu = $_SESSION["ID_PERFUSU"];
$sqlUsu = "SELECT `ID_EMP` FROM `perfil_usuario` WHERE `ID_PERFUSU`=" . $idUsu; 
$queryUsu = mysql_query($sqlUsu, $conexao);
$resultUsu = mysql_fetch_array($queryUsu);

//INSERE ATIVIDADES SELECIONADAS NO BANCO
if (isset($_POST['cadastrar'])) {

	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_select_db($banco);
	$atividades = "SELECT `ATIVIDADES_ATIEMPPLA`, `ID_EMP` from ATIVIDADES_EMPRESA_PLAT WHERE ID_EMP = " . $resultUsu["ID_EMP"];
	$queryAti = mysql_query($atividades, $conexao);
	$registros = mysql_num_rows($queryAti);

	
	if(isset($_POST['atividades'])){
		 		 
	 	$listaAtividades = $_POST['atividades'];
	 	$atividadesSelecionadas = implode(",",$listaAtividades);
	 	$listaPontos = $_POST['pontos'];
	 	$pontos = implode(",",$listaPontos);
	    
	    if($registros != "0"){
			$sqlAti = "UPDATE `atividades_empresa_plat` SET `ATIVIDADES_ATIEMPPLA`='" . $atividadesSelecionadas . "', PONTOS_ATIEMPPLA='". $pontos . "' WHERE `ID_EMP` = " . $resultUsu["ID_EMP"];
		} else {
			$sqlAti = "INSERT INTO ATIVIDADES_EMPRESA_PLAT (ATIVIDADES_ATIEMPPLA, PONTOS_ATIEMPPLA, STATUS_ATIEMPPLA, ID_EMP) VALUES ('". $atividadesSelecionadas . "','". $pontos . "','1'," . $resultUsu["ID_EMP"] . ")";
		}	

		$queryAti = mysql_query($sqlAti, $conexao);
		header("Location: ../selecao_atividades.php"); /* REDIRECIONA USUARIO PARA MESMA PAGINA DE SELECAO */

	} else {
		echo 'Voce nao selecionou nenhuma atividade ';
	}
	

}
?>