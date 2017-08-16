<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Usuarios</h4>
  </div>
  <div class="card-content table-responsive">


	<a href="index.php?view=novousuario" data-background-color="blue" class="btn btn-default">Novo Usuario</a>
<br>
	
		<?php

		$users = UsuarioData::getAll();
		if(count($users)>0){
		
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nome completo</th>
			<th>Email</th>
			<th>CPF</th>
            <th>IDADE</th>
			<th>ATIVO_PERFUSU</th>
			<th>Tipo</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->NOME_PERFUSU." ".$user->SOBRENOME_PERFUSU; ?></td>
				<td><?php echo $user->EMAIL_PERFUSU; ?></td>
				<td><?php echo $user->CPF_PERFUSU; ?></td>
				<td><?php echo $user->IDADE_PERFUSU; ?></td>
				<td>
					<?php if($user->ATIVO_PERFUSU):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->TIPO_PERFUSU==1):?>
					Administrador
					<?php elseif($user->TIPO_PERFUSU==2):?>
					Usuario
					<?php endif; ?>
				</td>
				<td style="width:180px;">
				<a href="index.php?view=editusuario&id=<?php echo $user->ID_PERFUSU;?>" class="btn btn-warning btn-xs">Editar</a>
<a href="index.php?view=delusuario&id=<?php echo $user->ID_PERFUSU;?>" class="btn btn-danger btn-xs">Excluir</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			<?php



		}
		else{
			
		}


		?>

</div>
</div>
	</div>
</div>