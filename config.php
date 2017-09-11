<?php
date_default_timezone_set('America/Sao_Paulo');
$host = "localhost";
$usuario = "001aluno";
$senha = "123456";
$banco = "0002050";

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



