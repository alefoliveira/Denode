<?php
date_default_timezone_set('America/Sao_Paulo');
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "0002050";

$localtime = localtime();
$localtime_assoc = localtime(time(), true);
print_r($localtime);
print_r($localtime_assoc);

print_r($localtime[6]);