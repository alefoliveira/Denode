<?php

if(count($_POST)>0){
	$user = new UsuarioData();
	$user->NOME_PERFUSU = $_POST["NOME_PERFUSU"];
	$user->SOBRENOME_PERFUSU = $_POST["SOBRENOME_PERFUSU"];
	$user->CPF_PERFUSU = $_POST["CPF_PERFUSU"];
	$user->IDADE_PERFUSU = $_POST["IDADE_PERFUSU"];
	$user->EMAIL_PERFUSU = $_POST["EMAIL_PERFUSU"];
	$user->TIPO_PERFUSU = $_POST["TIPO_PERFUSU"];
	$user->SENHA_PERFUSU = sha1(md5($_POST["SENHA_PERFUSU"]));
	$user->add();

print "<script>window.location='index.php?view=usuarios';</script>";


}


?>