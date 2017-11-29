<?php 
$codigoverificacion= rand(0000000000,9999999999);
$mensaje ="
<style>
.header{
	background:#EFEFEF;
	color:#7D7B7B;
	font-size:.9em;
	padding:15px;
}
.titulo{
	font-size:1.8em;
}
.contenido{
	color:#636060;
}
a{
	background: #5361F5;
	color:white;
	font-size:0.95em;
	padding:6px;
	text-decoration:none;
}
</style>
<div class='header'><span>&#161;Felicitaciones! Tu anuncio ya se encuentra online en Vendeloenelvalle.com</span></div><br>
<img src='img/logo.png'>
<p class='titulo'>&#161;Felicitaciones! Ahora los compradores pueden ver tu anuncio en Vendeloenelvalle.com</p>
<div class='contenido'>
<p>Hola Gracias por usar Vendeloenelvalle.com ahora los compradores pueden ver tu anuncio en internet</p>
<p>&#191;Necesitas cambiar algo?</p>
<p>Ingresa en este enlace<p>
<a href='confirmar.php?codigo=".$codigoverificacion."'>Administrar Anuncio</a>
<p>Gracias por usar Vendeloenelvalle.com</p></div>";
echo $mensaje;
$cod_p=$codigoverificacion+time();
echo "$codigoverificacion<br>";
echo "$cod_p<br>";
$cod_2=874104572+time();
echo $cod_2;
echo"codigo anterior 2313433849";
?>