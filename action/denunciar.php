<?php 
$id_anuncio=mysql_real_escape_string(stripslashes($_POST['id_hdn']));
$motivo=mysql_real_escape_string(stripslashes($_POST['motivo-denuncia']));
$comentario=mysql_real_escape_string(stripslashes($_POST['comentario-denuncia']));

if(!empty($id_anuncio) || !empty($motivo) || !empty($comentario)){
	include("../modulos/conexion.php");
	mysql_query("INSERT INTO denuncias (motivo,comentario,anuncio_id) VALUES ('$motivo','$comentario','$id_anuncio')");
	header("Location: ../success.php?re=v-denuncia-true&id=$id_anuncio");
}else{
	header("Location: ../success.php?re=false-den&id=$id_anuncio");
}

?>