<?php


if(count($_POST)>0){
$user = AtividadeData::getById($_POST["id"]);
$user->SESSAO_ID_PLAT = $_POST["SESSAO_ID_PLAT"];
$user->TITULO_ATIPLA = $_POST["TITULO_ATIPLA"];
$user->COR_ATIPLA = $_POST["COR_ATIPLA"];
$user->DESCRICAO_ATIPLA = $_POST["DESCRICAO_ATIPLA"];
$user->EXERCICIOS_ID_PLAT= $_POST["EXERCICIOS_ID_PLAT"];
$user->MEMBRO_ID_PLAT= $_POST["MEMBRO_ID_PLAT"];
$user->PRIORIDADE_PLAT_ID = $_POST["PRIORIDADE_PLAT_ID"];
$user->ID_PERFUSU = $_SESSION["ID_PERFUSU"];
$user->STATUS_ID = $_POST["STATUS_ID"];
$user->TIPO_PERFUSU_id = $_POST["TIPO_PERFUSU_id"];
$user->DURACAO_ATIPLA = $_POST["DURACAO_ATIPLA"];

$user->update();


Admin::alert("Atualizado com sucesso!");
print "<script>window.location='index.php?view=atividade';</script>";


}


?>