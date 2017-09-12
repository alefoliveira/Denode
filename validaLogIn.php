<?php
   include '../config.php';
require_once('Bcrypt.php');


$valorEmail = $_POST["email"];
$valorSenha = $_POST["senha"];

if($valorEmail && $valorSenha != '') {
	$conexao = mysqli_connect($host, $usuario, $senha, $banco) or die('Não foi possivel conectar: '.mysql_error());
			$sql = mysqli_query($conexao, "SELECT * FROM perfil_usuario WHERE EMAIL_PERFUSU ='$valorEmail'");//seleciona o banco dados login do email
			$cont = mysqli_num_rows($sql);//cont recebe a a linha selecionada
				while($linha = mysqli_fetch_array($sql)){
					$senhaDb = $linha["SENHA_PERFUSU"];	
					$nomeUsu = $linha["NOME_PERFUSU"];
					$sobrenomeUsu = $linha["SOBRENOME_PERFUSU"];
					$idUsu = $linha["ID_PERFUSU"];
					$tipo = $linha["TIPO_PERFUSU"];
					
					//echo $ativo;
				}
				if($cont==0){//se o login não for o cadastrado
					header("Location:../denodelogin.php?erro=2");
				}
				else{	

					if (Bcrypt::check($valorSenha, $senha_db)) {

						//SESSION START
						session_cache_expire(30); //expira em quanto tempo?
						session_start(); //session_start(['read_and_close'=>1]); se nao alterar dados da sessao - se alterar usar session_commit()0
						session_regenerate_id(); //re-do after profile update
						$_SESSION["NOME_PERFUSU"]= $nomeUsu; 
						$_SESSION["SOBRENOME_PERFUSU"]= $sobrenomeUsu; 
						$_SESSION["ID_PERFUSU"] = $idUsu;
						$_SESSION["TIPO_PERFUSU"] = $tipo;
						//SESSION SETUP END

						if($Tipo == 1){
							header("location:../usudash.php");	
						} else if($Tipo == 2) {
							header("location:../admindash.php");	
						} else {
							echo "Something went wrong";
						}

						

					} else { //senha errada
						header("Location:../denodelogin.php?erro=1");
					}
				}
			} 
            ?>