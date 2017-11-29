<?php
include("../modulos/conexion.php");
$categoriahija = mysql_real_escape_string(stripslashes($_POST['categoriahija']));
$categoria_hdn = "ultimos anuncios valle chicama";
$titulo = mysql_real_escape_string(stripslashes($_POST['titulo_anuncio_txt']));
$descripcion = mysql_real_escape_string(stripslashes($_POST['descripcion_anuncio_txtarea']));
$precio = mysql_real_escape_string(stripslashes($_POST['precio_articulo_txt']));
$date = "fecha_publicacion";
$nombre = mysql_real_escape_string(stripslashes($_POST['nombre_anunciante_txt']));
$email = mysql_real_escape_string(stripslashes($_POST['email_anunciante_txt']));
$telefono = mysql_real_escape_string(stripslashes($_POST['telefono_anunciante_txt']));
$localidad = mysql_real_escape_string(stripslashes($_POST['localidad_anunciante_slc']));
$codigo_simple = rand(0000000000,9999999999);
$codigo=$codigo_simple+time();


$tamañoimg1 = $_FILES['img_anuncio_fls']['size'];
$tamañoimg2 = $_FILES['img_anuncio2_fls']['size'];
$tamañoimg3 = $_FILES['img_anuncio3_fls']['size'];

if (empty($categoriahija) || empty($titulo) || empty($descripcion) || empty($precio) || empty($nombre) || empty($email) || empty($localidad)){
	header("Location: ../success.php?re=f-posting");
}else{
if (empty($_FILES['img_anuncio_fls']['tmp_name']) && empty($_FILES['img_anuncio2_fls']['tmp_name']) && empty($_FILES['img_anuncio3_fls']['tmp_name'])){
	$imagen_generica = "generica.jpg";
	$imagen1 = $imagen_generica;
}
if ($tamañoimg1>2097152 || $tamañoimg2>2097152 || $tamañoimg3>2097152){
	header("Location: ../success.php?re=f-size"); //error: excede el tamaño permitido de 3MB
}
if ($_FILES["img_anuncio_fls"]["type"] =="image/jpeg" || $_FILES["img_anuncio_fls"]["type"] =="image/gif" || $_FILES["img_anuncio_fls"]["type"] =="image/png"){
	$imagen1 = time()."-1.jpg";
}
else
{
	header("Location: ../success.php?re=f-type"); //error: No es tipo de archivo permitido
}
if ($_FILES["img_anuncio2_fls"]["type"] =="image/jpeg" || $_FILES["img_anuncio2_fls"]["type"] =="image/gif" || $_FILES["img_anuncio2_fls"]["type"] =="image/png"){
	$imagen2 = time()."-2.jpg";
}
else
{
	header("Location: ../success.php?re=f-type"); //error: No es tipo de archivo permitido
}
if ($_FILES["img_anuncio3_fls"]["type"] =="image/jpeg" || $_FILES["img_anuncio3_fls"]["type"] =="image/gif" || $_FILES["img_anuncio3_fls"]["type"] =="image/png"){
	$imagen3 = time()."-3.jpg";
}else
{
	header("Location: ../success.php?re=f-type"); //error: No es tipo de archivo permitido
}

$resultado1 = @move_uploaded_file($_FILES['img_anuncio_fls']['tmp_name'], "../img/anuncios/".$imagen1);
$resultado2 = @move_uploaded_file($_FILES['img_anuncio2_fls']['tmp_name'], "../img/anuncios/".$imagen2);
$resultado3 = @move_uploaded_file($_FILES['img_anuncio3_fls']['tmp_name'], "../img/anuncios/".$imagen3);

if ($resultado1 || $resultado2 || $resultado3 || $imagen_generica){
$headers = "De: support@vendeloenelvalle.com";
$asunto = "¡Felicitaciones! Tu anuncio ya se encuentra online en vendeloenelvalle.com";
$mensaje = 
"<style>
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
<img src='http://vendeloenelvalle.com/img/logo.png'>
<p class='titulo'>&#161;Felicitaciones! Ahora los compradores pueden ver tu anuncio en Vendeloenelvalle.com</p>
<div class='contenido'>
<p>Hola Gracias por usar Vendeloenelvalle.com ahora los compradores pueden ver tu anuncio en internet</p>
<p>&#191;Necesitas cambiar algo?</p>
<p>Ingresa en este enlace<p>
<a href='http://vendeloenelvalle.com/edit.php?codigo=".$codigo."'><-Administrar Anuncio-></a>
<p>Gracias por usar Vendeloenelvalle.com</p></div>";

if(@mail($email,$asunto,$mensaje,$headers)){
 $con=mysql_connect($servidor,$user,$password) or die ("Ha ocurrido un error al conectar con el servidor");
 mysql_select_db($db,$con) or die ("ha ocurrido un error al conectar con la base de datos");
 mysql_query("INSERT INTO anuncios (categoriahija_id,categoria_hdn,titulo,descripcion,imagen1,imagen2,imagen3,precio,fecha_publicacion,nombre_anunciante,telefono,email,distrito,codigo) VALUES ('$categoriahija','$categoria_hdn','$titulo','$descripcion','$imagen1','$imagen2','$imagen3','$precio',now(),'$nombre','$telefono','$email','$localidad','$codigo')",$con);

 header("Location: ../success.php?re=v-true"); 
}else{
 header("Location: ../success.php?re=f-email");
} 

}
}
?>