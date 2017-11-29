<?php 
$servidor="localhost";
$user="root";
$password="computo";
$db="directorio_prueba";

$con=mysql_connect($servidor,$user,$password);

if (!$con){
	echo "ERROR: conexion fallida al servidor";
}else{
	mysql_select_db($db,$con) or die ("error al seleccionar bd");
}
function quitar($str){
	$no_permitidos = array("'", "\"","\\","*","OR","SELECT", "=", " ");
	return str_replace($no_permitidos, "", $str);
}
function quitar_q($str){
	$no_permitidos = array("'", "\"","\\","*","OR","SELECT", "=");
	return str_replace($no_permitidos, "", $str);
}
?>