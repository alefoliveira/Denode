<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Sessões</h4>
  </div>
  <div class="card-content table-responsive">
	<a href="index.php?view=novasessao" data-background-color="blue" class="btn btn-default"></i> Nova Sessão</a>

		<?php

		$users = SessaoData::getAll();
		if(count($users)>0){
			
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nome</th>
			<th style="width:80px;"></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->ID_EMP." ".$user->SOBRENOME_PERFUSU; ?></td>
				<td style="width:80px;" class="td-actions"><a href="index.php?view=editsessao&ID_SESPLA=<?php echo $user->ID_SESPLA;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs"><i class='fa fa-pencil'></i></a> <a href="index.php?view=delsessao&ID_SESPLA=<?php echo $user->ID_SESPLA;?>" rel="tooltip" title="Excluir" class=" btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a></td>
				</tr>
				<?php

			}
?>
</table>
<?php


		}else{
			echo "<p class='alert alert-danger'>Você não está inscrito em nenhuma sessão</p>";
		}


		?>

</div>
</div>
	</div>
</div>