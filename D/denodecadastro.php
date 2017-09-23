<?php
include 'config.php';
include'apoio/Bcrypt.php';

$conexao = mysqli_connect($host, $usuario, $senha, $banco) or die('Não foi possivel conectar: '.mysql_error());
mysqli_query($conexao,"SET SESSION sql_mode = ''");

if(isset($_POST['userCpf'])){
  $cpfExist = $_POST['userCpf'];
  $checkdata = "SELECT CPF_PERFUSU FROM perfil_usuario WHERE CPF_PERFUSU = '$cpfExist'";
  $sql = mysqli_query($conexao, $sql);
  if(mysqli_num_rows($sql) > 0){
    echo "<span>CPF já registrado</span>";
  } else {
    echo "OK";
  }
  exit();
}
?>
<html>
   
   <head>
      <title>Add New Record in MySQL Database</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/formvalidation.js"></script>
      <link rel="stylesheet" type="text/css" href="css/validationstyle.css">
   </head>
   
   <body>
      <?php
   include 'config.php';

  error_reporting(0);
  $admin=$_GET['admin'];
    //https://stackoverflow.com/questions/11895226/create-an-notification-alert-at-an-specific-time
  //ativo 1
   ?>
   <p id="jsteste"><p>
            
    <form  enctype="multipart/form-data" method = "post" action = "apoio/novocadastro.php" name = "cadform">
    <table width = "600" border = "0" cellspacing = "1" 
                     cellpadding = "2">

      <input type="hidden" name="admin" value="<?php echo $admin ?>">

                      <tr>
                        <td width = "100" key="cad_nome">Nome</td>
                        <td>
    <input name = "nome" type = "text" id = "nome" maxlength="30" placeholder="Primeiro nome">
    <span  class="erro" id="err1" value=""></span>
                           </td>
                     </tr>
                     <tr>
                        <td width = "100" key="cad_sobrenome">Sobrenome</td>
                        <td>
    <input name = "sobrenome" type = "text" id = "sobrenome"  maxlength="100" placeholder="Ultimo nome">
    <span  class="erro" id="err2" value=""></span>
                           </td>
                     </tr>
                     <tr>
                        <td width = "100" key="cad_ano">Data de nascimento</td>
                        <td>
    <input name = "anonascimento" type = "text" id = "anonascimento" placeholder="1990">
    <span  class="erro" id="err3" value=""></span>
                           </td>
                     </tr>
                      <tr>
                        <td width = "100" key="cad_sexo">Sexo</td>
                        <td>
    <input name = "sexo" type = "radio" id = "sexo" value="M">
    <input name = "sexo" type = "radio" id = "sexo" value="F">
    <input name = "sexo" type = "radio" id = "sexo" value="O">
                           </td>
                     </tr>
                     <tr>
                        <td width = "100" key="cad_cpf">CPF</td>
                        <td>


    <input name = "cpf" type = "text" id = "cpf" placeholder="99999999999" maxlength="11">
    <input type="hidden" name="cpfExiste" id="cpfExiste">
    <span  class="erro" id="err4" value=""></span>
                           </td>

                     </tr>
                     <tr>
                        <td width = "100" key="cad_cargo">Cargo</td>
                        <td>
      <input name = "cargo" type = "text" id = "cargo" maxlength="30" placeholder="Analista de sistemas">
      <span  class="erro" id="err5" value=""></span>
                           </td>
                     </tr>
                     <tr>
                        <td width = "100" key="cad_email">Email</td>
                        <td>
      <input name = "email" type = "email" id = "email" maxlength="140" placeholder="seunome@empresa.com">
      <span  class="erro" id="err6" value=""></span>
                           </td>
                     </tr>
                     <tr>
                     <td width = "100" key="cad_imagem">Foto</td>
          					 <td>
        <input type="file" name="foto_perfil"></td>
          				</tr>
                     <tr>
                        <td width = "100" key="cad_senha">Senha</td>
                        <td>
        <input name = "senha" type = "password" id = "senha" maxlength="16" placeholder="00000000">
        <span  class="erro" id="err7" value=""></span>
                           </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Cadastro" disabled="disabled">
                        </td>
                     </tr>
                  </table>
               </form>
   </body>
</html>