<?php
require 'config.php';
  $conexao = @mysqli_connect($host, $usuario, $senha, $banco) or Die();
?>

<!DOCTYPE html>
	<head>
		<title>Gerenciar usuário</title>
		
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>

			
			<form action="ranking.php" method=POST>
				
				<div class=output>
					<?php
						
						$sql="SELECT * FROM perfil_usuario order by PONTOS_PERFUSU DESC";
							$result = $conexao->query($sql);
                              $i= 1; 
                            
						if($result->num_rows > 0 || $i){
							echo "<table class=slist>";
							echo "<tr>";
							echo "<th>Colocação &nbsp; &nbsp;</td> ";
						    echo "<th>Usuário</td> ";
							echo "<th>Pontuação</td>";
							echo "</tr>";
							while($row = $result->fetch_assoc()){
								echo "<tr>";
								echo 	"<td>" . $i++ . "° &nbsp; &nbsp;&nbsp; &nbsp;</td>";
								echo 	"<td>" . $row["NOME_PERFUSU"] . "</td>";
								echo 	"<td>" . $row["PONTOS_PERFUSU"] .  " &nbsp; &nbsp;</td>";
								echo "</tr>";
							}	
						}
						else
							echo "<div align='center' style='font-size:20px'>Naõ há dados.</div>";

						

						echo "</table>";  

						$conexao->close();
					?>
				</div>
			</form>
		</article>
	</body>
</html>
