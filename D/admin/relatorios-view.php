<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">RELATÓRIOS</h4>
  </div>
  <div class="card-content table-responsive">


<form class="form-horizontal" role="form">
<input type="hidden" name="view" value="relatorios">
        <?php
$exercicios = ExercicioData::getAll();
$prioridade = PrioridadeData::getAll();
$statusuario =   StatusData::getAll();
$TIPO_PERFUSUs =      TipoData::getAll();
        ?>

  <div class="form-group">

    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-male"></i></span>
<select name="EXERCICIOS_ID_PLAT" class="form-control">
<option value="">EXERCÍCIO</option>
  <?php foreach($exercicios as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["EXERCICIOS_ID_PLAT"]) && $_GET["EXERCICIOS_ID_PLAT"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-support"></i></span>
<select name="PRIORIDADE_PLAT_ID" class="form-control">
<option value="">PRIORIDADE</option>
  <?php foreach($prioridade as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["PRIORIDADE_PLAT_ID"]) && $_GET["PRIORIDADE_PLAT_ID"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">INICIO</span>
		  <input type="date" name="start_at" value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">ÚLTIMO ACESSO </span>
		  <input type="date" name="finish_at" value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>

  </div>
  <div class="form-group">

    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">STATUS</span>
<select name="STATUS_ID" class="form-control">
  <?php foreach($statusuario as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["STATUS_ID"]) && $_GET["STATUS_ID"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">TIPO</span>
<select name="TIPO_PERFUSU_id" class="form-control">
  <?php foreach($TIPO_PERFUSUs as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["TIPO_PERFUSU_id"]) && $_GET["TIPO_PERFUSU_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-6">
    <button class="btn btn-primary btn-block">Processar</button>
    </div>

  </div>
</form>

		<?php
$users= array();
if((isset($_GET["STATUS_ID"]) && isset($_GET["TIPO_PERFUSU_id"]) && isset($_GET["EXERCICIOS_ID_PLAT"]) && isset($_GET["PRIORIDADE_PLAT_ID"]) && isset($_GET["start_at"]) && isset($_GET["finish_at"]) ) && ($_GET["STATUS_ID"]!="" ||$_GET["TIPO_PERFUSU_id"]!="" || $_GET["EXERCICIOS_ID_PLAT"]!="" || $_GET["PRIORIDADE_PLAT_ID"]!="" || ($_GET["start_at"]!="" && $_GET["finish_at"]!="") ) ) {
$sql = "select * from atividades_plat where ";
if($_GET["STATUS_ID"]!=""){
	$sql .= " STATUS_ID = ".$_GET["STATUS_ID"];
}

if($_GET["TIPO_PERFUSU_id"]!=""){
if($_GET["STATUS_ID"]!=""){
	$sql .= " and ";
}
	$sql .= " TIPO_PERFUSU_id = ".$_GET["TIPO_PERFUSU_id"];
}


if($_GET["EXERCICIOS_ID_PLAT"]!=""){
if($_GET["STATUS_ID"]!=""||$_GET["TIPO_PERFUSU_id"]!=""){
	$sql .= " and ";
}
	$sql .= " EXERCICIOS_ID_PLAT = ".$_GET["EXERCICIOS_ID_PLAT"];
}

if($_GET["PRIORIDADE_PLAT_ID"]!=""){
if($_GET["STATUS_ID"]!=""||$_GET["EXERCICIOS_ID_PLAT"]!=""||$_GET["TIPO_PERFUSU_id"]!=""){
	$sql .= " and ";
}

	$sql .= " PRIORIDADE_PLAT_ID = ".$_GET["PRIORIDADE_PLAT_ID"];
}



if($_GET["start_at"]!="" && $_GET["finish_at"]){
if($_GET["STATUS_ID"]!=""||$_GET["EXERCICIOS_ID_PLAT"]!="" ||$_GET["PRIORIDADE_PLAT_ID"]!="" ||$_GET["TIPO_PERFUSU_id"]!="" ){
	$sql .= " and ";
}

	$sql .= " ( date_at >= \"".$_GET["start_at"]."\" and date_at <= \"".$_GET["finish_at"]."\" ) ";
}

		$users = AtividadeData::getBySQL($sql);

}else{
		$users = AtividadeData::getAll();

}
		if(count($users)>0){
			// Se possui usuarios
			$_SESSION["report_data"] = $users;
			?>
			<div class="panel panel-default">
			<div class="panel-heading">
			Relatórios</div>
			<table class="table table-bordered table-hover">
			<thead>


			<th>Assunto</th>
			<th>Exercício</th>
			<th>Tipo</th>
			<th>Sessão</th>
			<th>Prioridade</th>
			<th>Status</th>
			<th>Último acesso</th>
			<th>Última Atualização</th>


			</thead>
			<?php
			$total = 0;
			foreach($users as $user){
				$project  = $user->getProject();
				$medic = $user->getprioridade_plat();
				?>
				<tr>
				<td><?php echo $user->TITULO_ATIPLA; ?></td>
				<td><?php echo $project->TITULO_EXERPLAT; ?></td>
				<td><?php echo $user->getTIPO_PERFUSU()->name; ?></td>
				<td><?php echo $user->getTIPO_PERFUSU()->name; ?></td>

				<td><?php echo $medic->name; ?></td>
				<td><?php echo $user->getStatus()->name; ?></td>
				<td><?php echo $user->DURACAO_ATIPLA; ?></td>
				<td><?php echo $user->ATUALIZADO_EM; ?></td>
				</tr>
				<?php

			}
			echo "</table>";
			?>
			<div class="panel-body">

			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>Não há atividades cadastradas</p>";
		}


		?>

	</div>
</div>

	</div>
</div>
