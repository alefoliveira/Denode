<?php

if(Session::getUID()=="") {
$user = $_POST['NOME_PERFUSU'];
$pass = sha1(md5($_POST['SENHA_PERFUSU']));

$base = new Database();
$con = $base->connect();
 $sql = "select * from perfil_usuario where (NOME_PERFUSU= \"".$user."\" or NOME_PERFUSU= \"".$user."\") and SENHA_PERFUSU= \"".$pass."\" and ATIVO_PERFUSU=1";

$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['ID_PERFUSU'];
}

if($found==true) {

	$_SESSION['ID_PERFUSU']=$userid ;

	print "Carregando ... $user";
	print "<script>window.location='index.php?view=home';</script>";
}else {
	print "<script>window.location='index.php?view=login';</script>";
}

}else{
	print "<script>window.location='index.php?view=home';</script>";
	
}
?>