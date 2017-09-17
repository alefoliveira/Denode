<?php
	require 'config.php';

	session_start();//INICIO SESSAO
	$nome = $_SESSION['NOME_PERFUSU'];
	$sobrenome = $_SESSION['SOBRENOME_PERFUSU'];
	$idUsu = $_SESSION["ID_PERFUSU"];


	$sqlUsu = " SELECT `TIPO_PERFUSU`, `ID_EMP` FROM `perfil_usuario` WHERE `ID_PERFUSU`=" . $idUsu; 
	$queryUsu =	mysqli_query($conexao, $sqlUsu);
	$resultUsu = mysqli_fetch_array($queryUsu);
?>
<?php
 
	$origsenha = '';

	$result = mysqli_query( $conexao, "SELECT  SENHA_PERFUSU FROM perfil_usuario WHERE ID_PERFUSU = '$idUsu'");

     while($row = mysqli_fetch_array($result, MYSQL_BOTH)) 
          {
         
		    	$origsenha =  $row['SENHA_PERFUSU'];
        
			
			}


     if(isset($_POST['submit'])){

          	if(! get_magic_quotes_gpc() ) {
               
              $Tipo = 2;
               $NOVASENHA = addslashes (@$_POST['senha']);
            }else {
              
             
               $Tipo = 2;
               $NOVASENHA = $_POST['senha'];
            }
           
          
 
			$origsenha = $NOVASENHA;


            $sql = "UPDATE `perfil_usuario` SET `SENHA_PERFUSU` = '$NOVASENHA' ";

           $retval = mysqli_query( $conexao, $sql);
           echo "Cadastro atualizado com sucesso";
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            } 

            }

            @mysql_close($conexao);
          

	?>

  <?php
if(isset($_POST['deletarusuario'])){
  $user_id = isset($_POST['ID_PERFUSU']) ? $_POST['ID_PERFUSU'] : false;
  if($user_id) {
  $query = mysqli_query( $conexao, "DELETE FROM perfil_usuario where ID_PERFUSU= $user_id LIMIT 1")or die(mysqli_error($conexao));

  } else {
    echo "No user name found!";
  }
}
 ?>
<html lang='pt-br'>


	<head>

		<meta charset="utf-8">

		<title>DENODE</title>

		<!-- ESTILOS -->
		<link rel="stylesheet" type="text/css" href="css/pop-up.css">

		<!-- SCRIPTS -->
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

	</head>

	<body>
	    
    <?php 


    include 'master.php'; ?>
    <script>
      $(document).ready(function(){
        $(".menu_inicio").css('font-weight', '700'); //INCLUIR SCRIPT E ALTERAR EM CADA PAGINA
      });


    </script>

  <div class="div2"></div>
		<section id="container">


<input class="modal-state" id="modal-1" type="checkbox" />
 


 <div class="modal" >
  <label class="modal__bg" for="modal-1"></label>
 <center> <div class=" scroll modal__inner" id="pop"   >
    <label class="modal__close" for="modal-1"></label>
  <h1  >Redefinir Senha <hr style="width:150px;"/></h1>

    
  <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                 <table  border = "0" cellspacing = "1"  
                     cellpadding = "2"  id="tabela">
                  
                    <tr>  
                      <br>
<br>
                        <center> <td> <input  class="inputpopup" name = "senha" type = "password" 
                           id = "senha" placeholder=" Nova Senha" value="<?php echo $origsenha; ?>"></td>
                  </tr>

                     <tr>
                      
                        <td><input name = "senha" type = "password" 
                           id = "senha"  class="inputpopup"  placeholder="Confirme a Senha" value="<?php echo $origsenha; ?>"></td>
                     </tr>

                      <tr>
                     
                        <td><input name = "senha" type = "password" 
                           id = "senha" class="inputpopup"  placeholder="Senha do Administrador"  value="<?php echo $origsenha; ?>"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                      
                     </tr>  
                  
                  </table>
              <input name = "submit" type = "submit"  class="botaopopup" id = "submit" 
                              value = "Redefinir"> </input> </form>
              </div> </center>
</div> 


	
			<aside = id="equipe">
        <img src="img/equipe.svg"  width="173px">
        <h1>EQUIPE</h1>  <p>Veja aqui todos os colaboradores já cadastrados</p>
     
	</aside>
    <aside = id="newuser">
<a href="notificacoes.php?Pagina=novousuario" data-background-color="blue" class="newuser"> 
<img src="img/newuser.svg" alt="NOVOUSER" style="padding-left:985px; "/> 
 <p> Cadastrar novo usuário</p>
</a>  
  
</aside>

			<aside id="conteudo">

	
<div class="row">
	<div class="col-md-28">

<div class="card">



<br>
<br>
	   <form action=''  method='post'> 
    
		<?php
						
						$sql="SELECT * FROM perfil_usuario ";

							$result = $conexao->query($sql);
                         
                            
						if($result->num_rows > 0){
							
              echo "<CENTER ><table>";

							echo "<thead >";

              echo "<th width='200px'>Nome</th>";
						  echo "<th width='200px'>Cargo</th>";
							echo "<th width='200px'>Último Acesso</th>";
							echo " </thead>";


     
							while($row = $result->fetch_assoc()){?>



<input class="modal-state" id="modal-2" type="checkbox" />
<div class="modal scroll" id="pop">
  <label class="modal__bg" for="modal-2"></label>
  <div class="modal__inner scroll">

    <label class="modal__close" for="modal-2"></label>


  <CENTER>  <h1 class="modal-title">Excluir Usuário</h1></CENTER>
    <CENTER>  <p>Tem certeza que deseja excluir o usuário?</p>
                <p>Essa ação não poderá ser desfeita.</p></CENTER> 
                  <div class="modal-footer">
      <input type='hidden' name='ID_PERFUSU' value='<?php echo $row["ID_PERFUSU"]; ?>' /> 
  <input type='submit' name='deletarusuario'  class="botaosim" value='Sim' /><input type='submit'class="botaonao" value='Não'/> 
        </div></div>

						
		         <?php   echo "<tr> ";
   
		            echo  " <td width='200px' style='border-bottom: 0.5px solid #ccc; padding-bottom:10px'> <br> <br>
                <img  style='width: 70px;  height: 70px; margin-top: -30px; margin-left: 15px; background-size: 100%; border-radius: 100%;border: 4px solid #988cc2;   float: left;
                background-image: url(". $row["LOCALIMG_PERFUSU"] ." ) '/>
               <br> </td> ";
		           	echo 	"<td width='250' style='border-bottom: 0.5px solid #ccc;' name= 'ID_PERFUSU' >" . $row["NOME_PERFUSU"] . " " . $row["SOBRENOME_PERFUSU"] . "</td>";
								echo 	"<td width='250'style='border-bottom: 0.5px solid #ccc;'>" . $row["CARGO_PERFUSU"] .  "</td>";
								echo 	"<td width='250' style='border-bottom: 0.5px solid #ccc;'>" . $row["DURACAO_ATIPLA"] . "</td>";
								echo "<td style='border-bottom: 0.5px solid #ccc;'>";
               echo "<a><label class='btn btn--blue' for='modal-1'> &nbsp;&nbsp; <img src='img/edituser.svg' name='btn_delete' /></label> </a>";
              echo "  <a><label class='btn btn--blue' for='modal-3'>  &nbsp;&nbsp;<img src='img/alteraruser.svg' name='btn_delete'/></label> </a>";
               echo " <a><label class='btn btn--blue' for='modal-2'> &nbsp;&nbsp; <img src='img/deluser.svg' name='btn_delete'/></label> </a>";
               echo"</td>"; 
                  
  echo "</tr>";  
              	} }	
                echo "</table> ";


 
?>	
</form> 
</div>
</div>
	</div>
</div>

			</aside>

		</section>
</div