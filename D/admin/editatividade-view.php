<?php 
$atividade = AtividadeData::getById($_GET["id"]);
$exercicio= ExercicioData::getAll();
$prioridade = PrioridadeData::getAll();
$statusuario = StatusData::getAll();
$tipo = TipoData::getAll();
?>
<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Modificar  Atividade</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?view=updateatividade">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-10">
<select name="TIPO_PERFUSU_id" class="form-control" required>
  <?php foreach($tipo as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$atividade->TIPO_PERFUSU_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" name="TITULO_ATIPLA" value="<?php echo $atividade->TITULO_ATIPLA; ?>" required class="form-control" id="inputEmail1" placeholder="Assunto">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descrição</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="DESCRICAO_ATIPLA" placeholder="Descripcion"><?php echo $atividade->DESCRICAO_ATIPLA;?></textarea>
    </div>

  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Exercício</label>
    <div class="col-lg-4">
<select name="EXERCICIOS_ID_PLAT" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($exercicioas $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$atividade->EXERCICIOS_ID_PLAT){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Sessão</label>
    <div class="col-lg-4">
<select name="SESSAO_ID_PLAT" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach(SessaoData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$atividade->SESSAO_ID_PLAT){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>

  </div>


  <div class="form-group">

    <label for="inputEmail1" class="col-lg-2 control-label">Prioridade</label>
    <div class="col-lg-4">
<select name="PRIORIDADE_PLAT_ID" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($prioridade as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$atividade->PRIORIDADE_PLAT_ID){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Status</label>
    <div class="col-lg-4">
<select name="STATUS_ID" class="form-control" required>
  <?php foreach($statusuario as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$atividade->STATUS_ID){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">

  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id" value="<?php echo $atividade->ID_ATIPLA; ?>">
      <button type="submit" class="btn btn-default">Atualizar</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>