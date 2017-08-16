<?php

$client = ExercicioData::getById($_GET["id"]);
$client->del();
Admin::redir("./index.php?view=exercicios");

?>