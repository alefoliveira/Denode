<?php

$sqlNot = "SELECT `ID_NOTPLA`,`DESCRICAO_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA` FROM `notificacoes_plat` WHERE `DESTINATARIOS_NOTPLA` LIKE '%" . $idUsu . "%' AND `STATUS_NOTPLA` = 0"; //SELECIONA TODAS AS NOTIFICACOES NAO VISUALIZADAS
$queryNot = mysql_query($sqlNot, $conexao);

$qtdNot = 0;

while ($resultNot = mysql_fetch_array($queryNot)){
	$qtdNot += 1; //CONTA QUANTAS NOTIFICACOES NAO VISUALIZADAS O USUARIO TEM
}

?>

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
		<ul>
			<li id="botao" class="menu_ergonomia">
				<a href="">Ergonomia</a>
			</li>
			<li id="notificacoes"  class="menu_notificacoes">
				<img src="img/iconset.svg#svgView(viewBox(4, 115, 18, 23))" alt="Agenda">
				<p id="not_cont"><?php echo $qtdNot ?></p>
			</li>
			<li class="menu_ajuda">
				<p>Ajuda</p>
				<img src="img/iconset.svg#svgView(viewBox(7, 134, 11, 29))" alt="Agenda">
			</li>
			<li class="menu_usuario">
				<p>Olá, <?php echo $nome; ?></p>
				<img src="img/iconset.svg#svgView(viewBox(7, 134, 11, 29))" alt="Agenda">
			</li>
		</ul>
	</section>	
</section>