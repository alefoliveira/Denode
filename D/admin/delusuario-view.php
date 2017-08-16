<?php

$user = UsuarioData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=usuarios';</script>";

?>