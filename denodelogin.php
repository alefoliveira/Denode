
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href=" css/bootstrap.min.css" rel="stylesheet" />
    <link href=" css/pop-up.css" rel="stylesheet"/>
    <script src=" js/jquery.min.js" type="text/javascript"></script>

<br><br><br><br>
<br><br><br><br><br>
<div class="container">
<div class="">
    	<div class="col-md-4 col-md-offset-4">
    
    	
    
    
<div class="card">
  <div class="card-header  color" id="menulateral">
      <center><h1><b>Denode</b></h1></center>
  </div>
  <div class="card-content table-responsive">
			    	<form accept-charset="UTF-8" role="form" method="post" action="apoio/validalogin.php">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Digite seu email" name="email" maxlength="50" required type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Digite sua Senha"  maxlength="50" required name="senha" type="password" value="">
                  <br>
                 <span>Cadastre-se clicando<a href="denodecadastro.php" class="color"> aqui</a></span><br>

            	</div>
			    		<input class="btn btn-primary bgcolor btn-block" type="submit" value="Entrar">
			    	</fieldset>
			      	</form>
		

  <?php
  error_reporting(0);
  $erro=$_GET['erro'];
  if(isset($erro)){
    switch ($erro) {
      case 0:
        echo"
        <div style=' color:blue; font-family:Montserrat Light '><center>Cadastro efetuado com sucesso!!!</center></div>";
        break;
      case 1:
        echo"<div style=' color:red; font-family:Montserrat Light '><center>Erro ao fazer o Login. Senha Inválida!</center></div>";
      break;
      case 2:
        echo"<div style=' color:red; font-family:Montserrat Light '><center>Erro ao fazer o Login. Email Inválido!</center></div>";
      break;
            case 3:
       echo"<div style='color:red; font-family:Montserrat Light'><center>Erro! Você deve estar Logado para acessar o conteúdo.</center></div>";
            break;
            case 4:
                echo"<div style=' color:purple; font-family:Montserrat Light'><center>Você foi desconectado!</center></div>";
            break;
            case 5:
            break;
    }}
  

?>

          </div>
              </div>
    </div>
  </div>
</div>
