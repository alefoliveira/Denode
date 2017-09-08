<?php
   include 'config.php';
require_once('Bcrypt.php');


$valorEmail = $_POST["email"];
$valorSenha = $_POST["senha"];

if($valorEmail && $valorSenha != '') {
			$sql = mysql_query("SELECT * FROM perfil_usuario WHERE EMAIL_PERFUSU ='$valorEmail'");//seleciona o banco dados login do email
			$cont = mysql_num_rows($sql);//cont recebe a a linha selecionada
				while($linha = mysql_fetch_array($sql)){
					$senha_db = $linha["SENHA_PERFUSU"];	
					$nomeusu = $linha["NOME_PERFUSU"];
					$IDusu = $linha["ID_PERFUSU"];
					$Tipo = $linha["TIPO_PERFUSU"];
					
					//echo $ativo;
				}
				if($cont==0){//se o login não for o cadastrado
					header("Location:denodelogin.php?erro=2");
				}
				else{	

					if (Bcrypt::check($valorSenha, $senha_db)) {

						//SESSION START
						session_cache_expire(30); //expira em quanto tempo?
						session_start(); //session_start(['read_and_close'=>1]); se nao alterar dados da sessao - se alterar usar session_commit()0
						session_regenerate_id(); //re-do after profile update
						$_SESSION["NOME_PERFUSU"]= $nomeusu; 
						$_SESSION["ID_PERFUSU"] = $IDusu;
						$_SESSION["TIPO_PERFUSU"] = $Tipo;
						//SESSION SETUP END

						if($Tipo == 1){
							header("location:usudash.php");	
						} else if($Tipo == 2) {
							header("location:admindash.php");	
						} else {
							echo "Something went wrong";
						}

						

					} else { //senha errada
						header("Location:denodelogin.php?erro=1");
					}
				}
			} 

					/*if($senha_db != $valorSenha){//se a senha não for igual a que o admim cadastrou
					header("Location:denodelogin.php?erro=1");
					}
					
					else{	
						session_cache_expire(30); //expira em quanto tempo?
						session_start();
						$_SESSION["NOME_PERFUSU"]= $nomeusu; //aqui é pra deixar o email oupuxar o nome?
						$_SESSION["ID_PERFUSU"] = $IDusu;

						if($Tipo = 1){
						header("location:usudash.php");	
					} else {
						header("location:admindash.php");	
					}


							//session_destroy();
						}
							
				}
		}*/

            ?>