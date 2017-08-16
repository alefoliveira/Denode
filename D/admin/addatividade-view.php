<?php


$r = new AtividadeData();

$r->TITULO_ATIPLA = $_POST["TITULO_ATIPLA"];
$r->DESCRICAO_ATIPLA = $_POST["DESCRICAO_ATIPLA"];
$r->COR_ATIPLA = $_POST["COR_ATIPLA"];
$r->SESSAO_ID_PLAT = $_POST["SESSAO_ID_PLAT"];
$r->EXERCICIOS_ID_PLAT= $_POST["EXERCICIOS_ID_PLAT"];
$r->MEMBRO_ID_PLAT= $_POST["MEMBRO_ID_PLAT"];
$r->PRIORIDADE_PLAT_ID = $_POST["PRIORIDADE_PLAT_ID"];
$r->ID_PERFUSU = $_SESSION["ID_PERFUSU"];
$r->STATUS_ID = $_POST["STATUS_ID"];
$r->TIPO_PERFUSU_id = $_POST["TIPO_PERFUSU_id"];
$r->add();

Admin::alert("Adicionado com sucesso!");
Admin::redir("./index.php?view=atividade");
?>

<?php

