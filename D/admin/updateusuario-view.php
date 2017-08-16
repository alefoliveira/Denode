<?php

if(count($_POST)>0){
	$ATIVO_PERFUSU=0;
	if(isset($_POST["ATIVO_PERFUSU"])){$ATIVO_PERFUSU=1;}
	$user = UsuarioData::getById($_POST["ID_PERFUSU"]);
	$user->NOME_PERFUSU = $_POST["NOME_PERFUSU"];
	$user->SOBRENOME_PERFUSU = $_POST["SOBRENOME_PERFUSU"];
	$user->CPF_PERFUSU = $_POST["CPF_PERFUSU"];
	$user->IDADE_PERFUSU = $_POST["IDADE_PERFUSU"];
	$user->EMAIL_PERFUSU = $_POST["EMAIL_PERFUSU"];
	$user->TIPO_PERFUSU = $_POST["TIPO_PERFUSU"];
	$user->ATIVO_PERFUSU=$ATIVO_PERFUSU;
	$user->update();

	if($_POST["SENHA_PERFUSU"]!=""){
		$user->SENHA_PERFUSU = sha1(md5($_POST["SENHA_PERFUSU"]));
		$user->update_passwd();
print "<script>alert('Atualizado ocm sucesso!');</script>";

	}

print "<script>window.location='index.php?view=usuarios';</script>";


}


?>