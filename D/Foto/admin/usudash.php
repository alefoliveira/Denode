<?php 
include 'config.php';
session_start();
if(!isset($_SESSION['ID_PERFUSU'])){
   header("Location:denodelogin.php?erro=3");
}
$nome = $_SESSION['NOME_PERFUSU'];
$id = $_SESSION["ID_PERFUSU"];
$tipo = $_SESSION['TIPO_PERFUSU'];
echo "bem vindo ".$nome;
echo "você é um ".$tipo;

$sql = mysql_query("SELECT IMAGEM_PERFUSU,LOCALIMG_PERFUSU from perfil_usuario WHERE ID_PERFUSU = '$id'") or die(mysql_error());
      $rows = mysql_num_rows($sql);

      while($result=mysql_fetch_array($sql)){?>

<html>
    <head>
        <title>DENODE - PROGRAMA DE GINASTICA LABORAL</title>
        <meta charset="UTF-8">
        </head>
        <body>
        <br></br>
        <img src=  <?php echo $result['LOCALIMG_PERFUSU'];?> />

        <a href="denodelogout.php">Log Out</button><br></br>
         <a href="editcadastro.php" key="menu_editar">Editar</button><br></br>
         <a href="perfildador.php" key="menu_perfildador">Perfil da dor</button><br></br>
         <a href="feedback_solicitacaodeexclusao.php" key="menu_solicitexclu">Solicitar exclusão</button><br></br>
         <a href="editcadastro.php" key="menu_ajuda">Ajuda</button><br></br>
         <a href="editcadastro.php" key="menu_cleyton">Sua postura!</button><br></br>
 <?php } ?>
        </body>
	</html>