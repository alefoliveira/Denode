<?php $user = SessaoData::getById($_GET["ID_SESPLA"]);?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Sessões</h4>
  </div>
  <div class="card-content table-responsive">


		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatesessao" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nome*</label>
    <div class="col-md-6">
      <input type="text" name="ID_EMP" value="<?php echo $user->ID_EMP;?>" class="form-control" id="ID_EMP" placeholder="Nome">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="ID_PERFUSU" value="<?php echo $user->ID_SESPLA;?>">
      <button type="submit" class="btn btn-primary">Atualizar Sessão</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>