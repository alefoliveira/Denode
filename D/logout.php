<?php
session_start(); // Iniciando sessão

if(isset($_SESSION['ID_PERFUSU'])){
	unset($_SESSION['ID_PERFUSU']);

	//Isset: Verifica se uma variável existe, foi iniciada ou se ela não é nula. 
	//Unset: Remove uma variável
}

session_destroy();  //Removendo a sessão

print "<script>window.location='index.php';</script>";
?>