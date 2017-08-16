<?php


if(count($_POST)>0){
	$user = new ExercicioData();
	$user->TITULO_EXERPLAT = $_POST["TITULO_EXERPLAT"];
	$user->add();

print "<script>window.location='index.php?view=exercicios';</script>";


}


?>