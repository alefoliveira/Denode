<?php
date_default_timezone_set('America/Sao_Paulo');
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "0002050";


$conexao = mysqli_connect($host, $usuario, $senha, $banco) or die('Não foi possivel conectar: '.mysql_error());
mysqli_query($conexao,"SET SESSION sql_mode = ''");


$localtime = localtime();
$localtime_assoc = localtime(time(), true);

?>

<script src="js/timer.js"></script>
<script>
	var timer = new Timer(1000);
	timer.reset(3000, function() {
		window.alert('timer');
	});
</script>



