<html>
   
   <head>
     
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/formvalidation.js"></script>
      <link rel="stylesheet" type="text/css" href="css/validationstyle.css">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href=" css/pop-up.css" rel="stylesheet"/>
    <script src="js/jquery.min.js" type="text/javascript"></script>

   </head>
   
   <body>
      <?php
   include 'config.php';

error_reporting(0);
$admin=$_GET['admin'];
  //https://stackoverflow.com/questions/11895226/create-an-notification-alert-at-an-specific-time

            ?>
            
<br><br><br>

<div class="container">
<div class="">
      <div class="col-md-4 col-md-offset-4">
    

<div class="card">
  <div class="card-header  color" id="menulateral">
      <center><h1><b>Denode</b></h1></center>
  </div>
  <div class="card-content table-responsive"> <form  enctype="multipart/form-data" method = "post" action = "apoio/novocadastro.php" name = "cadform">
  <input type="hidden" name="admin" value="<?php echo $admin ?>">
                  
 <div class="form-group" key="cad_cpf">
  <input class="form-control" placeholder="CPF" name = "cpf" type = "text" 
   id = "cpf" maxlength="50" required ><span  class="erro" id="err1" key="erro1">Por favor insira seu CPF</span> 
<!--<span class="erro" id="err2" key="erro2">CPF inválido. Por favor insira apenas 11 números. Ex: 99999999999</span> -->
  </div> 
 
  
                     
  <div class="form-group"   key="cad-nome">
    <input class="form-control" placeholder="Nome" name="nome" maxlength="30"  id = "nome"  required type="text">
   <span  class="erro" id="err3"  key="erro3">Por favor insira seu nome</span>
<!-- <span class="erro" id="err4"  key="erro4">Nome inválido. Por favor insira apenas letras. Ex: Maria</span> -->
   </div>
<div class="form-group" key="cad_sobrenome">
                  <input class="form-control" placeholder="Sobrenome" name="sobrenome" maxlength="100" id = "sobrenome"  required type="text">
              <span  class="erro" id="err5"  key="erro5">Por favor insira seu sobrenome</span>
              <!-- <span class="erro" id="err6"  key="erro6">Sobrenome inválido. Por favor insira apenas letras. Ex: Silva</span> -->
                          </div>   

   <div class="form-group" key="cad_ano">
                  <input class="form-control" placeholder="Ano de nascimento"   
                  id = "anonascimento" name = "anonascimento" type="text">
       <span  class="erro" id="err7"  key="erro7">Por favor insira seu ano de nascimento</span>
 <!--<span class="erro" id="err8"  key="erro8">Data inválida. Por favor insira o ano em que nasceu. Ex: 1980</span> -->
             </div>
                      
 <div class="form-group" key="cad_email">
 <input class="form-control" placeholder="Email"  id = "email" maxlength="140" name = "email" type="email">
   <span  class="erro" id="err9"  key="erro9">Por favor insira seu email</span>
   <!--<span class="erro" id="err10"  key="erro10">Email inválido. Por favor insira um email válido. Ex: mariasilva@empresa.com</span>-->
             </div>           

            <div class="form-group" key="cad_imagem">
                 <input type="file" name="foto_perfil"></td>
                         </div>
                 
           

                                <div class="form-group" key="cad_senha">
                  <input class="form-control" placeholder="Senha"  id = "senha" maxlength="16" name = "senha"   required type="password">
             <span  class="erro" id="err11"  key="erro11">Por favor insira uma senha</span>
              <!-- <span class="erro" id="err12"  key="erro12">Senha inválida. Por favor insira no mínimo 8 caractéres.</span> -->
                          </div> 

                     
                  <input class="btn btn-primary " name = "add" type = "submit" id = "add" 
                              value = "Cadastro">


               </form>



                </div>
              </div>
    </div>
  </div>
</div>
   </body>
</html>
