<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Novo usuario</h4>
  </div>
  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addusuario" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nome*</label>
    <div class="col-md-6">
      <input type="text" name="NOME_PERFUSU" class="form-control" id="NOME_PERFUSU" placeholder="Nome">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Sobrenome*</label>
    <div class="col-md-6">
      <input type="text" name="SOBRENOME_PERFUSU" required class="form-control" id="SOBRENOME_PERFUSU" placeholder="Sobrenome">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">CPF*</label>
    <div class="col-md-6">
      <input type="text" name="CPF_PERFUSU" class="form-control" required id="CPF_PERFUSU" placeholder="CPG">
    </div>
  </div>

    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Idade*</label>
    <div class="col-md-6">
      <input type="text" name="IDADE_PERFUSU" class="form-control" required id="CPF_PERFUSU" placeholder="Idade">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">EMAIL_PERFUSU*</label>
    <div class="col-md-6">
      <input type="text" name="EMAIL_PERFUSU" class="form-control" id="EMAIL_PERFUSU" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Senha</label>
    <div class="col-md-6">
      <input type="SENHA_PERFUSU" name="SENHA_PERFUSU" class="form-control" id="inputEmail1" placeholder="Senha">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-md-6">
<select name="TIPO_PERFUSU" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
    <option value="1">Administrador</option>
    <option value="2">Usuario</option>
</select> 
   </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Adicionar Usuario</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>
</div>