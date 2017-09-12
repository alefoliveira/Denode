<?php

$sqlNot = "SELECT `ID_NOTPLA`,`DESCRICAO_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA` FROM `notificacoes_plat` WHERE `PENDENTES_NOTPLA` LIKE '%" . $idUsu . "%'"; //SELECIONA TODAS AS NOTIFICACOES NAO VISUALIZADAS
$queryNot = mysqli_query($conexao, $sqlNot);

$qtdNot = 0;

while ($resultNot = mysqli_fetch_array($queryNot)){
	$qtdNot += 1; //CONTA QUANTAS NOTIFICACOES NAO VISUALIZADAS O USUARIO TEM
}


$sqlNot2 = "SELECT COUNT(*) FROM `notificacoes_plat` WHERE `DESTINATARIOS_NOTPLA` LIKE '%" . $idUsu . "%'"; //SELECIONA TODAS AS NOTIFICACOES PARA USUARIO LOGADO - PARA CONTAGEM
$queryNot2 = mysqli_query($conexao, $sqlNot2);
$resultNot2 = mysqli_fetch_array($queryNot2);

$sqlUsu = "SELECT `TIPO_PERFUSU`, `ID_EMP` FROM `perfil_usuario` WHERE `ID_PERFUSU`=" . $idUsu; 
$queryUsu = mysqli_query($conexao, $sqlUsu);
$resultUsu = mysqli_fetch_array($queryUsu);
?>

<script src="js/master.js"></script>
<section id="navegacao">
	<section id="menu_lateral">
		<img src="img/logo_denode.svg" id="logo" />

			<?php if (isset($_GET['platArea'])){			
				$area =$_GET['platArea'];
				if ($area == 2) {
					require 'apoio/master_menu_admin.php';
				} else {
					require 'apoio/master_menu_colab.php';
				}
			} else {
					require 'apoio/master_menu_colab.php';
				}

			?>

	</section>
	<section id="menu_superior">

		<?php if (isset($_GET['platArea'])){			
			$area = $_GET['platArea'];
			if ($area == 2 && $resultUsu["TIPO_PERFUSU"] == 2) {
		?>
			<section id="area_empresa">
				<span>NOME DA EMPRESA</span> <!-- ALTERAR PARA PEGAR NOME DO BD -->
				<p>VOCÊ ESTÁ NA ÁREA DE ADMINISTRAÇÃO</p>
			</section>
		<?php } 
		} ?>
		<ul>
			<li id="botao" class="menu_ergonomia">
				<a href="">Ergonomia</a>
			</li>
			<li id="notificacoes"  class="menu_notificacoes">
				<img src="img/iconset.svg#svgView(viewBox(4, 115, 18, 23))" alt="Agenda">
				
				<?php 

				if ($resultNot2[0] != 0) {

					if ($qtdNot != 0) { ?>
						<p id="not_cont"><?php echo $qtdNot ?></p>
					<?php } ?>
					<ul id="submenu_notificacoes">
						<?php
						
						$sqlNot3 = "SELECT `ID_NOTPLA`,`DESCRICAO_NOTPLA`,`REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `PENDENTES_NOTPLA`, `CATEGORIA_NOTPLA` FROM `notificacoes_plat` WHERE `DESTINATARIOS_NOTPLA` LIKE '%" . $idUsu . "%'"; //SELECIONA TODAS AS NOTIFICACOES NAO VISUALIZADAS
						$queryNot3 = mysqli_query($conexao, $sqlNot3);

						while ($resultNot3 = mysqli_fetch_array($queryNot3)){
							
							$data = strtotime($resultNot3['DATA_NOTPLA']);
							$dataFormatada = date("d/m/y", $data);

							$pendentes = explode(',', $resultNot3['PENDENTES_NOTPLA']);

						 	?>
							<span id="linha"> </span>
							<?php if (in_array($idUsu, $pendentes)) {
								echo '<li class="item_notificacoes pendentes" id="'.$resultNot3['ID_NOTPLA'].'">
									<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">';

									if($resultNot3['CATEGORIA_NOTPLA'] == 1) { 
										echo '<p class="descricao">A sessão '. $resultNot3['DESCRICAO_NOTPLA'] .' irá começar em 15 minutos. Prepare-se!.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 2) { 
										echo '<p class="descricao">'. $resultNot3['REMETENTE_NOTPLA'] .' convidou você para a sessão '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 3) {

										$sqlRemNot = "SELECT `NOME_PERFUSU`, `SOBRENOME_PERFUSU` FROM `perfil_usuario` WHERE `ID_PERFUSU` =" . $resultNot3['REMETENTE_NOTPLA']; //SELECIONA NOME E SOBRENOME DO REMETENTE DA NOTIFICACAO
										$queryRemNot = mysqli_query($conexao, $sqlRemNot);

										$resultRemNot = mysqli_fetch_array($queryRemNot);

										echo '<p class="descricao">'. $resultRemNot['NOME_PERFUSU'] . ' ' . $resultRemNot['SOBRENOME_PERFUSU'] .' solicitou deixar de participar da sessão '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 4) { 
										echo '<p class="descricao"> Você atingiu a conquista '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';
									} else {
										echo '<p class="descricao"> Você conquistou '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';
									}
										echo '<p class="data">'. $dataFormatada .'</p>
								</li>';
							} else {
								echo '<li style="color: #4d4c4c; font-weight: 200;" class="item_notificacoes" id="'.$resultNot3['ID_NOTPLA'].'">
								<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">';
								

								if($resultNot3['CATEGORIA_NOTPLA'] == 1) { 
										echo '<p class="descricao">A sessão '. $resultNot3['DESCRICAO_NOTPLA'] .' irá começar em 15 minutos. Prepare-se!</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 2) { 
										echo '<p class="descricao">'. $resultNot3['REMETENTE_NOTPLA'] .' convidou você para a sessão '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 3) {

										$sqlRemNot = "SELECT `NOME_PERFUSU`, `SOBRENOME_PERFUSU` FROM `perfil_usuario` WHERE `ID_PERFUSU` =" . $resultNot3['REMETENTE_NOTPLA']; //SELECIONA NOME E SOBRENOME DO REMETENTE DA NOTIFICACAO
										$queryRemNot = mysqli_query($conexao, $sqlRemNot);

										$resultRemNot = mysqli_fetch_array($queryRemNot);

										echo '<p class="descricao">'. $resultRemNot['NOME_PERFUSU'] . ' ' . $resultRemNot['SOBRENOME_PERFUSU'] .' solicitou deixar de participar da sessão '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';

									} else if($resultNot3['CATEGORIA_NOTPLA'] == 4) { 
										echo '<p class="descricao"> Você atingiu a conquista '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';
									} else {
										echo '<p class="descricao"> Você conquistou '. $resultNot3['DESCRICAO_NOTPLA'] .'.</p>';
									}

								echo '<p class="data">'. $dataFormatada .'</p>
								</li>';
							}
						} ?>

						<a href="inbox.php">Ver Mais</a>
					</ul>
				<?php
				} else {
					echo '<script>$("#notificacoes").css("cursor", "auto");</script>';
				} ?>

				<script>
					
					$(".item_notificacoes").click(function(){
									
						$qtdNot = <?php echo json_encode($qtdNot) ?>;
						$idNotPla = $(this).attr("id");
						$.ajax("apoio/consulta_notificacoes.php?idNotPla=" + $idNotPla, {
							success: function(response) {
								$qtdNot -= 1;
								if($qtdNot == 0) {
									$('#not_cont').css('display', 'none');
								} else {
									$('#not_cont').text($qtdNot);
								}
								$('#' + $idNotPla + ' p').css('color', '#4d4c4c');
								$('#' + $idNotPla + ' p').css('font-weight', '200');
							}
						});
					});
				</script>

			</li>
			<li class="menu_ajuda">
				<p class="label" >Ajuda</p>
				<img src="img/iconset.svg#svgView(viewBox(7, 134, 11, 29))" alt="Agenda">

				<ul id="submenu_ajuda">
					<span id="linha"> </span>
					<li class="menu_introducao">
						<a href="">
							<p>Introdução</p>
						</a>
					</li>
					<li class="menu_manual">
						<a href="">
							<p>Manual</p>
						</a>
					</li>
					<li class="menu_faq">
						<a href="">
							<p>FAQ</p>
						</a>
					</li>
				</ul>

			</li>
			<li class="menu_usuario">
				<aside id="informacoes_usuario">
					<p class="label"> 

						<?php if (isset($_GET['platArea'])){			
							$area = $_GET['platArea'];
							if ($area == 1) { ?>
								Olá, 
							<?php } 
						} else {?> Olá, <?php } ?>

						<?php echo $nome . ' ' . $sobrenome; ?>
						
					</p>
					
					<?php 

						$sqlImg = mysqli_query($conexao, "SELECT IMAGEM_PERFUSU,LOCALIMG_PERFUSU from perfil_usuario WHERE ID_PERFUSU = " . $idUsu) or die(mysql_error());
						$rowsImg = mysqli_num_rows($sqlImg);

						while($resultImg=mysqli_fetch_array($sqlImg)){ ?>
							<div id="foto" style="background-image: url('<?php echo $resultImg['LOCALIMG_PERFUSU'];?>')"></div>
					<?php } ?>
				</aside>
				<ul id="submenu_usuario">
					<span id="linha"> </span>

					<?php if (isset($_GET['platArea'])){			
						$area =$_GET['platArea'];
						if ($area == 2 && $resultUsu["TIPO_PERFUSU"] == 2) {
					?>
						<li class="menu_administracao">
							<a href="home_admin.php?platArea=2">
								<p>Administração</p>
							</a>
						</li>
					<?php }
					} ?>

					<li class="menu_perfil">
						<a href="">
							<p>Perfil</p>
						</a>
					</li>
					<li class="menu_editar">
						<a href="">
							<p>Editar Perfil</p>
						</a>
					</li>
					<li class="menu_configuracoes">
						<a href="">
							<p>Configurações</p>
						</a>
					</li>
					<li class="menu_sair">
						<a href="denodelogout.php">
							<p>Sair</p>
						</a>
					</li>
				</ul>

			</li>
		</ul>
	</section>			
	<div id="submenus_overlay"></div>
</section>
