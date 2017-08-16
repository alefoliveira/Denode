<?php $user = ExercicioData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Editar Exercícios</h4>
  </div>
  <div class="card-content table-responsive">
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateexercicio" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nome*</label>
    <div class="col-md-6">
      <input type="text" name="TITULO_EXERPLAT" value="<?php echo $user->TITULO_EXERPLAT;?>" class="form-control" id="TITULO_EXERPLAT" placeholder="Título">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="ID_PERFUSU" value="<?php echo $user->ID_EXERPLAT;?>">
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>