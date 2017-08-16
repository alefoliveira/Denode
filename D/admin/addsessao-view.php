<?php


if(count($_POST)>0){
	$user = new SessaoData();
	$user->ID_EMP = $_POST["ID_EMP"];
	$user->add();

print "<script>window.location='index.php?view=sessao';</script>";


}


?>