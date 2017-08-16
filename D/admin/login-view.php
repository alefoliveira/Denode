

<?php

if(Session::getUID()!=""){
    print "<script>window.location='index.php?view=home';</script>";
}
?>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href=" css/bootstrap.min.css" rel="stylesheet" />
    <link href=" css/material-dashboard.css" rel="stylesheet"/>
    <script src=" js/jquery.min.js" type="text/javascript"></script>

<br><br><br><br><br>
<div class="container">
<div class="row">
    	<div class="col-md-4 col-md-offset-4">
    	<?php if(isset($_COOKIE['password_updated'])):?>
    		<div class="alert alert-success">
    		<p><i class='glyphicon glyphicon-off'></i> Senha redefinida com sucesso!!</p>
    		

    		</div>
    	<?php setcookie("password_updated","",time()-18600);
    	 endif; ?>

<div class="card">
  <div class="card-header" id="menulateral">
      <center><h4 class="title">DENODE</h4></center>
  </div>
  <div class="card-content table-responsive">
			    	<form accept-charset="UTF-8" role="form" method="post" action="index.php?view=processlogin">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Usuário" name="NOME_PERFUSU" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Digite sua Senha" name="SENHA_PERFUSU" type="password" value="">
			    		</div>
			    		<input class="btn btn-primary btn-block" type="submit" value="Entrar">
			    	</fieldset>
			      	</form>
			      	</div>
			      	</div>
		</div>
	</div>
</div>