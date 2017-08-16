<?php
$exercicios = ExercicioData::getAll();
$prioridade = PrioridadeData::getAll();

$statusuario = StatusData::getAll();
$TIPO_PERFUSUs = TipoData::getAll();

?>

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Inscrição de Atividade</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?view=addatividade">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Membro</label>
    <div class="col-lg-10">
<select name="TIPO_PERFUSU_id" class="form-control" required>
  <?php foreach($TIPO_PERFUSUs as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" name="TITULO_ATIPLA" required class="form-control" id="inputEmail1" placeholder="Titulo">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descrição</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="DESCRICAO_ATIPLA" required placeholder="Descrição"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Atividade</label>
    <div class="col-lg-4">
<select name="EXERCICIOS_ID_PLAT" class="form-control" required>
<option value="">-- Selecione --</option>
  <?php foreach($exercicios as $p):?>
    <option value="<?php echo $p->ID_EXERPLAT; ?>"><?php echo $p->TITULO_EXERPLAT; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Sessão</label>
    <div class="col-lg-4">
<select name="SESSAO_ID_PLAT" class="form-control" required>
<option value="">-- Selecione --</option>
  <?php foreach(SessaoData::getAll() as $p):?>
    <option value="<?php echo $p->ID_SESPLA; ?>"><?php echo $p->ID_EMP; ?></option>
  <?php endforeach; ?>
</select>
    </div>

  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Prioridade</label>
    <div class="col-lg-4">
<select name="PRIORIDADE_PLAT_ID" class="form-control" required>
<option value="">-- Selecione --</option>
  <?php foreach($prioridade as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
    <div class="col-lg-4">
<select name="STATUS_ID" class="form-control" required>
  <?php foreach($statusuario as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Inscrever</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>