<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">

</div>
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Exercícios</h4>
  </div>
  <div class="card-content table-responsive">
	<a href="index.php?view=novoexercicio" data-background-color="blue" class="btn btn-default"></i> Cadastrar Exercício</a>
		<?php

		$users = ExercicioData::getAll();
		if(count($users)>0){
			//Se possui usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nome</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->TITULO_EXERPLAT; ?></td>
				<td style="width:280px;">
				<a href="index.php?view=editexercicio&id=<?php echo $user->ID_EXERPLAT;?>" style="background-color:#ffd32b;" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delexercicio&id=<?php echo $user->ID_EXERPLAT;?>"  class="btn btn-danger btn-xs">Excluir</a>
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
			echo "<p class='alert alert-danger'>Não há exercícios cadastrados</p>";
		}


		?>


	</div>
</div>