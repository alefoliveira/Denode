<?php

$HOST = 'localhost';
$USER= 'root';
$PASS= '';
$BANCO = '0002050';

    $conexao = @mysql_connect($HOST,$USER,$PASS) or die('Não foi possivel conectar: '.mysql_error());

    $selecao = mysql_select_db($BANCO);
	mysql_query("SET SESSION sql_mode = ''", $conexao);

    ?>