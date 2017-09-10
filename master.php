<?php

$sqlNot = "SELECT `ID_NOTPLA`,`DESCRICAO_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA` FROM `notificacoes_plat` WHERE `DESTINATARIOS_NOTPLA` LIKE '%" . $idUsu . "%' AND `STATUS_NOTPLA` = 0"; //SELECIONA TODAS AS NOTIFICACOES NAO VISUALIZADAS
$queryNot = mysql_query($sqlNot, $conexao);

$qtdNot = 0;

while ($resultNot = mysql_fetch_array($queryNot)){
	$qtdNot += 1; //CONTA QUANTAS NOTIFICACOES NAO VISUALIZADAS O USUARIO TEM
}

?>

<script src="js/master.js"></script>
<section id="navegacao">
	<section id="menu_lateral">
		<img src="img/logo_denode.svg" id="logo" />

		<?php

			$sqlUsu = "SELECT `TIPO_PERFUSU`, `ID_EMP` FROM `perfil_usuario` WHERE `ID_PERFUSU`=" . $idUsu; 
			$queryUsu = mysql_query($sqlUsu, $conexao);
			$resultUsu = mysql_fetch_array($queryUsu);

			if ($resultUsu["TIPO_PERFUSU"] == 2) {
		?>

			<ul id="menu_colab">
				<li class="menu_inicio">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 0, 23, 23))" alt="Início">					
						<p>Início</p>
					</a>
				</li>
				<li class="menu_agenda">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 30, 23, 23))" alt="Agenda">
						<p>Agenda</p>
					</a>
				</li>
				<li class="menu_pontos">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">
						<p>Pontos</p>
					</a>
				</li>
				<li class="menu_conquistas">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 30, 23, 23))" alt="Agenda">
						<p>Conquistas</p>
					</a>
				</li>
				<li class="menu_relatorio">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 30, 23, 23))" alt="Agenda">
						<p>Relatório</p>
					</a>
				</li>
			</ul>

		<?php 
		} else if ($resultUsu["TIPO_PERFUSU"] == 1) {
		?>
			<ul id="menu_admin">
				<li class="menu_inicio">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 0, 23, 23))" alt="Início">					
						<p>Início</p>
					</a>
				</li>
				<li class="menu_agenda">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 30, 23, 23))" alt="Agenda">
						<p>Agenda</p>
					</a>
				</li>
				<li class="menu_equipe">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">
						<p>Equipe</p>
					</a>
				</li>
				<li class="menu_pontuacao">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">
						<p>Pontuação</p>
					</a>
				</li>
				<li class="menu_conquistas">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">
						<p>Conquistas</p>
					</a>
				<li class="menu_comunicados">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">
						<p>Comunicados</p>
					</a>
				</li>
				<li class="menu_relatorios">
					<a href="">
						<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">
						<p>Relatórios</p>
					</a>
				</li>
			</ul>
		<?php } ?>
	</section>
	<section id="menu_superior">

		<?php 
		if ($resultUsu["TIPO_PERFUSU"] == 1) {
		?>
			<section id="area_empresa">
				<span>NOME DA EMPRESA</span> <!-- ALTERAR PARA PEGAR NOME DO BD -->
				<p>VOCÊ ESTÁ NA ÁREA DE ADMINISTRAÇÃO</p>
			</section>
		<?php } ?>
		<ul>
			<li id="botao" class="menu_ergonomia">
				<a href="">Ergonomia</a>
			</li>
			<li id="notificacoes"  class="menu_notificacoes">
				<img src="img/iconset.svg#svgView(viewBox(4, 115, 18, 23))" alt="Agenda">
				
				<?php if ($qtdNot != 0) { ?>
					<p id="not_cont"><?php echo $qtdNot ?></p>

					<ul id="submenu_notificacoes">
						<?php

						$sqlNot2 = "SELECT `ID_NOTPLA`,`DESCRICAO_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA` FROM `notificacoes_plat` WHERE `DESTINATARIOS_NOTPLA` LIKE '%" . $idUsu . "%'"; //SELECIONA TODAS AS NOTIFICACOES NAO VISUALIZADAS
						$queryNot2 = mysql_query($sqlNot2, $conexao);

						while ($resultNot2 = mysql_fetch_array($queryNot2)){
							
							$data = strtotime($resultNot2['DATA_NOTPLA']);
							$dataFormatada = date("d/m/y", $data);
						 	?>
							<span id="linha"> </span>
							<?php if ($resultNot2['STATUS_NOTPLA'] == 0) {
								echo '<li style="font-weight: 700;" class="item_notificacoes" id="'.$resultNot2['ID_NOTPLA'].'">
									<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">
								<p style="color: #988cc2">'.$resultNot2['DESCRICAO_NOTPLA'].'</p>
								<p class="data">'. $dataFormatada .'</p>
								</li>';
							} else {
								echo '<li class="item_notificacoes" id="'.$resultNot2['ID_NOTPLA'].'">
								<img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda"><img src="img/iconset.svg#svgView(viewBox(0, 56, 23, 23))" alt="Agenda">
								<p style="font-weight: 500;">'.$resultNot2['DESCRICAO_NOTPLA'].'</p>
								<p class="data">'. $dataFormatada .'</p>
								</li>'; 
							}
						} ?>
					</ul>
				<?php
				} else {
					echo '<script>$("#notificacoes").css("cursor", "auto");</script>';
				} ?>

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
					<p class="label">Olá, <?php echo $nome . ' ' . $sobrenome; ?></p>
					
					<?php 

						$sqlImg = mysql_query("SELECT IMAGEM_PERFUSU,LOCALIMG_PERFUSU from perfil_usuario WHERE ID_PERFUSU = " . $idUsu) or die(mysql_error());
						$rowsImg = mysql_num_rows($sqlImg);

						while($resultImg=mysql_fetch_array($sqlImg)){ ?>

						<img id="foto" style="background-image: url('<?php echo $resultImg['LOCALIMG_PERFUSU'];?>')" />

						<!--img id="foto" src=  <?php echo $resultImg['LOCALIMG_PERFUSU'];?> /-->

					<?php } ?>
				</aside>
				<ul id="submenu_usuario">
					<span id="linha"> </span>
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