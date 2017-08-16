<?php

require 'config.php';
$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);


		function redirect(){
			$flag=0;
			$conexao=$this->banco();
			$sql="Select ID_PERFUSU from perfil_usuario";
			$result = $conexao->query($sql);

		
			if($flag==0)
				header("login.php");

			$conexao->close();
		}

		function redirectlogin(){
			$flag=0;
			$conexao=$this->banco();
			$sql="Select ID_PERFUSU from perfil_usuario";
			$result = $conexao->query($sql);

			if($_SESSION["NOME_PERFUSU"] == "admin")
				$flag=1;

			if($result->num_rows >0)
				while($row = $result->fetch_assoc())
					if($_SESSION["NOME_PERFUSU"] == $row["ID_PERFUSU"]){
						$flag=2;
						break;
					}

			else if($flag==1)
				header("Location: perfiladmin.php");
			else if($flag==2)
				header("Location:usuarios.php");

			$conexao->close();
		
	} 
?>
<?php	
		$sql = "SELECT ID_PERFUSU FROM perfil_usuario";
	    $query = mysql_query($sql, $conexao); //ESTABELECE CONEXAO ENTRE QUERY ($sql) E O BANCO DE DADOS
        $registros = mysql_num_rows($query); //CONTADOR DE RESULTADOS TRAZIDOS DO BANCO DE DADOS
		//Inserting values in dropdown
		echo "<select name='STD'>";
		echo "<option value='idusuario'>Id Usuário</option>";

		if ($query->num_rows > 0)
			while ($row = $result->fetch_assoc())
				echo "<option value='" . $row['ID_PERFUSU'] . "'>" . $row['ID_PERFUSU'] . "</option>";
		else
			echo "0 results";
		echo "</select>";
		


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
						
						$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
                        mysql_select_db($banco);

						$sql="SELECT * FROM perfil_usuario order by PONTOS_PERFUSU DESC";
							 $query = mysql_query($sql, $conexao);
                           $registros = mysql_num_rows($query); //CONTADOR DE RESULTADOS TRAZIDOS DO BANCO DE DADOS
                              $i= 1; 
                            
						if($query->num_rows > 0 || $i){
							echo "<table class=slist>";
							echo "<tr>";
							echo "<th>Colocação &nbsp; &nbsp;</td> ";
						    echo "<th>Usuário</td> ";
							echo "<th>Pontuação</td>";
							echo "</tr>";
							while($row = $query->fetch_assoc()){
								echo "<tr>";
								echo 	"<td>" . $i++ . "° &nbsp; &nbsp;&nbsp; &nbsp;</td>";
								echo 	"<td>" . $row["NOME_PERFUSU"] . "</td>";
								echo 	"<td>" . $row["PONTOS_PERFUSU"] .  " &nbsp; &nbsp;</td>";
								echo "</tr>";
							}	
						}
						else
							echo "<div align='center' style='font-size:20px'>No Records.</div>";

						

						echo "</table>";

						$conexao->close();
					?>
				</div>
			</form>
		</article>
	</body>
</html>