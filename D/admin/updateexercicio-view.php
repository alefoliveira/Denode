<?php

if(count($_POST)>0){
	$user = ExercicioData::getById($_POST["ID_PERFUSU"]);
	$user->TITULO_EXERPLAT= $_POST["TITULO_EXERPLAT"];
	$user->update();

Admin::alert("Atualizado com sucesso!");
print "<script>window.location='index.php?view=exercicios';</script>";


}


?>