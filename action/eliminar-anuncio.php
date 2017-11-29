<?php 
$delete_hdn=mysql_real_escape_string(stripslashes($_POST['delete_hdn']));
$codigo=mysql_real_escape_string(stripslashes($_POST['codigo_hdn']));
$hdn_verificar=$codigo-2368;

if($delete_hdn!=$hdn_verificar){
	header("Location: ../success.php?re=false-delete&ck=$codigo");
}else{
	include("../modulos/conexion.php");
	mysql_query("UPDATE anuncios SET codigo='', estado=0 WHERE codigo=$codigo");
	header("Location: ../success.php?re=true-delete&ck=$codigo");
}
?>