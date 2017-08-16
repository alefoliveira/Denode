<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">

</div>


<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Atividades</h4>
  </div>
  <div class="card-content table-responsive">
<a href="./index.php?view=novaatividade" class="btn btn-info">Nova Atividade</a>
<br><br>
<form class="form-horizontal" role="form">
<input type="hidden" name="view" value="atividade">
        <?php
$exercicios = ExercicioData::getAll();
$sessoes = SessaoData::getAll();
        ?>

  <div class="form-group">
    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-search"></i></span>
		  <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Palavra chave">
		</div>
    </div>
    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-flask"></i></span>
<select name="EXERCICIO_ID_PLAT" class="form-control">
<option value="">Exercícios</option>
  <?php foreach($exercicios as $p):?>
    <option value="<?php echo $p->ID_ATIPLA; ?>" <?php if(isset($_GET["EXERCICIO_ID_PLAT"]) && $_GET["EXERCICIO_ID_PLAT"]==$p->ID_ATIPLA){ echo "selected"; } ?>><?php echo $p->ID_ATIPLA." - ".$p->name." ".$p->SOBRENOME_PERFUSU; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-th-list"></i></span>
<select name="SESSAO_ID_PLAT" class="form-control">
<option value="">Sessão </option>
  <?php foreach($sessoes as $p):?>
    <option value="<?php echo $p->ID_ATIPLA; ?>" <?php if(isset($_GET["SESSAO_ID_PLAT"]) && $_GET["SESSAO_ID_PLAT"]==$p->ID_ATIPLA){ echo "selected"; } ?>><?php echo $p->ID_ATIPLA." - ".$p->name." ".$p->SOBRENOME_PERFUSU; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-4">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		  <input type="date" name="date_at" value="<?php if(isset($_GET["date_at"]) && $_GET["date_at"]!=""){ echo $_GET["date_at"]; } ?>" class="form-control" placeholder="Palavra clave">
		</div>
    </div>

    <div class="col-lg-2">
    <button class="btn btn-primary btn-block">Buscar</button>
    </div>

  </div>
</form>

		<?php
$users= array();
if((isset($_GET["q"]) && isset($_GET["EXERCICIO_ID_PLAT"]) && isset($_GET["SESSAO_ID_PLAT"]) && isset($_GET["date_at"])) && ($_GET["q"]!="" || $_GET["EXERCICIO_ID_PLAT"]!="" || $_GET["SESSAO_ID_PLAT"]!="" || $_GET["date_at"]!="") ) {
$sql = "select * from atividades_plat where ";
if($_GET["q"]!=""){
	$sql .= " (TITULO_ATIPLA like '%$_GET[q]%' or DESCRICAO_ATIPLA like '%$_GET[q]%') ";
}

if($_GET["EXERCICIO_ID_PLAT"]!=""){
if($_GET["q"]!=""){
	$sql .= " and ";
}
	$sql .= " EXERCICIO_ID_PLAT = ".$_GET["EXERCICIO_ID_PLAT"];
}

if($_GET["SESSAO_ID_PLAT"]!=""){
if($_GET["q"]!=""||$_GET["EXERCICIO_ID_PLAT"]!=""){
	$sql .= " and ";
}

	$sql .= " SESSAO_ID_PLAT = ".$_GET["SESSAO_ID_PLAT"];
}



if($_GET["date_at"]!=""){
if($_GET["q"]!=""||$_GET["EXERCICIO_ID_PLAT"]!="" ||$_GET["SESSAO_ID_PLAT"]!="" ){
	$sql .= " and ";
}

	$sql .= " date(DURACAO_ATIPLA) = \"".$_GET["date_at"]."\"";
}

		$users = AtividadeData::getBySQL($sql);
}else{
		$users = AtividadeData::getAll();

}
		if(count($users)>0){
		
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nome</th>
			<th>Atividade</th>
			<th>Prioridade</th>
			<th>Status</th>
			<th>Último acesso</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				$project  = $user->getProject();
				$medic = $user->getprioridade_plat();
				?>
				<tr>
				<td><?php echo $user->TITULO_ATIPLA; ?></td>
				<td><?php echo $project->TITULO_EXERPLAT; ?></td>
				<td><?php echo $medic->name; ?></td>
				<td><?php echo $user->getStatus()->NOME_PERFUSU; ?></td>
				<td><?php echo $user->DURACAO_ATIPLA; ?></td>
				<td style="width:180px;">
				<a href="index.php?view=editatividade&id=<?php
				 echo $user->ID_ATIPLA;?>"  style="background-color:#ffd32b;" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delatividade&id=<?php
				 echo $user->ID_ATIPLA;?>" class="btn btn-danger btn-xs">Excluir</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>Não há atividades cadastradas</p>";
		}


		?>


	</div>
</div>