<?php

$user = AtividadeData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=atividade';</script>";

?>