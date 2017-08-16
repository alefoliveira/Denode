<?php

$sessao_plat = SessaoData::getById($_GET["ID_SESPLA"]);

$sessao_plat->del();
Admin::redir("./index.php?view=sessao");


?>