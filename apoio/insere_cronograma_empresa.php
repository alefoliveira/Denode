
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
		
		$sqlAtiCro = "INSERT INTO `cronograma_empresa_plat`(`ID_EMP`, `ATIVIDADES_CROEMPPLA`, `INICIO_CROEMPPLA`, `FIM_CROEMPPLA`, `PARTICIPANTES_CROEMPPLA`, `ATIVO_CROEMPPLA`, `DIAS_CROEMPPLA`) VALUES (" . $resultUsu["ID_EMP"] . ",'". $atividadesSelecionadas . "','" . $_POST['inicio'] . "','" . $_POST['termino'] . "','". $colabSelecionados . "', " . $ativo . ",'" . $diasSelecionados . "')";

		echo $sqlAtiCro; //ALTERAR

		$queryAtiCro = mysql_query($sqlAtiCro, $conexao);
		//header("Location: ../cronograma_empresa.php"); /* REDIRECIONA USUARIO PARA MESMA PAGINA DE SELECAO */

		$descNot = "Você foi adicionado na sessão TITULO DA SESSAO"; //ALTERAR PARA VARIAVEL TITULO

		$qtdColab = count($colabSelecionados);

		$dataAtual =  date_create('now')->format('Y-m-d H:i:s');	
		echo $dataAtual;
		$i = 0;
			
			while ($i < $qtdColab){
				$sqlAtiNot = "INSERT INTO `notificacoes_plat`(`DESCRICAO_NOTPLA`, `REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA`) VALUES ('Você foi adicionado na sessão TITULO DA SESSAO','Administrador', '" . $listaColabCro[$i] . "', '" . $dataAtual . "' , 'img/icone_teste.png' , '#f0f', 0)";

				$queryAtiNot = mysql_query($sqlAtiNot, $conexao);

				$i++;
			}
 
		} else {
		echo 'Voce nao selecionou nenhuma atividade ';
	}
	
} ?>