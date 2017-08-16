<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" style="background-color:#162c38;">
									   <img src="./img/atividadesdash.svg"id="topicosmenu"></img>
								</div>
								<div class="card-content">
									<p class="sessao_plat">Atividades pedentes</p>
									<h3 class="title"><?php echo count(AtividadeData::getAllPendings());?></h3>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" style="background-color:#ffd32b;">
								   <img src="./img/exerciciodash.svg"id="topicosmenu"></img>
								</div>
								<div class="card-content">
									<p class="sessao_plat">Exercícios</p>
									<h3 class="title"><?php echo count(ExercicioData::getAll());?></h3>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
								   <img src="./img/sessaodash.svg"id="topicosmenu"></img>
								</div>
								<div class="card-content">
									<p class="sessao_plat">Sessões</p>
									<h3 class="title"><?php echo count(SessaoData::getAll());?></h3>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									   <img src="./img/equipedash.svg"id="topicosmenu"></img>
								</div>
								<div class="card-content">
									<p class="sessao_plat">Usuários</p>
									<h3 class="title"><?php echo count(UsuarioData::getAll());?></h3>
								</div>
							</div>
						</div>
					</div>



						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									   <img src="./img/ranking.svg"id="topicosmenu"></img>
									     
								</div>
								<br> <div class="card-content">
									<p class="sessao_plat">Ranking</p>
								<h4 class="ranking"><?php echo count(Ranking::getAll());?></h4>
								</div>
							</div>
						</div>
					</div>


