<br><br><br><br><div class="row">
	<div class="col-md-3">

	</div>
	<div class="col-md-6">
	<h2>Redefinir senha</h2>
<br>	<form class="form-horizontal" id="changepasswd" method="post" action="index.php?view=changepasswd" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Senha Atual</label>
    <div class="col-lg-8">
      <input type="password" class="form-control" id="SENHA_PERFUSU" name="SENHA_PERFUSU" placeholder="Senha Atual">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword1" class="col-lg-4 control-label">Nova Senha</label>
    <div class="col-lg-8">
      <input type="password" class="form-control"  id="newpassword" name="newpassword" placeholder="Nova Senha">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword1" class="col-lg-4 control-label">Confirmar Nova senha</label>
    <div class="col-lg-8">
      <input type="password" class="form-control" id="confirmnewpassword" name="confirmnewpassword" placeholder="Confirmar Nova senha">
    </div>
  </div>



  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
      <button type="submit" class="btn btn-info">Redefinir</button>
    </div>
  </div>
</form>

<script>
$("#changepasswd").submit(function(e){
	if($("#password").val()=="" || $("#newpassword").val()=="" || $("#confirmnewpassword").val()==""){
		e.preventDefault();
		alert("Preencha todos os campos");

	}else{
		if($("#newpassword").val() == $("#confirmnewpassword").val()){
//			alert("Correto");			
		}else{
			e.preventDefault();
			alert("As senhas não coincidem.");
		}
	}
});

</script>
	</div>
</div>
<br><br><br><br><br><br><br><br><br>