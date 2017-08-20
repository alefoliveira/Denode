

<?php
 include'config.php';
  $conexao = @mysqli_connect($host, $usuario, $senha, $banco) or Die();
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

   <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	['sessão total', 'sessão liberada'],
             <?php 
	        	$query = "SELECT count(LIBERADO_SESPLA) AS count, PARTICIPANTES_SESPLA FROM sessao_plat GROUP BY PARTICIPANTES_SESPLA";

	        	$exec = mysqli_query($conexao,$query);
	        	while($row = mysqli_fetch_array($exec)){

	        		echo "['".$row['PARTICIPANTES_SESPLA']."',".$row['count']."],";
	        	}
	   ?>
        ]);

        var options = {
          title: 'Progresso dos colaboradores'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));

        chart.draw(data, options);
      }
    </script>


   
  </head>
  <body>
  
  
   <div id="donut_single"  style="width=700px;"></div>
  <center><a href="index.php?view=relatorios">Ver mais detalhes</a>  </center>

  
 </body>
</html>
