<?php

if(count($_POST)>0){
	$user = SessaoData::getById($_POST["ID_PERFUSU"]);
	$user->ID_EMP= $_POST["ID_EMP"];
	$user->update();
print "<script>window.location='index.php?view=sessao';</script>";


}


?>