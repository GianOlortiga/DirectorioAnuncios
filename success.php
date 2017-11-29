<?php
if(empty($_GET['re'])){
	header("Location: index.php");
}else{
	include("modulos/conexion.php");
	$re=quitar($_GET['re']);
	$codigo=quitar($_GET['ck']);
	$id=quitar($_GET['id']);;
	switch ($re) {
		case 'v-true':
			$contenido="<div id='marco-suceso-1'><p><span class='glyphicon glyphicon-ok'></span> Su anuncio se ha publicado con exito.</p></div>";
			break;
		case 'v-true-edit':
			$contenido="<div id='marco-suceso-1'><p><span class='glyphicon glyphicon-ok'></span> Su anuncio se ha actualizado con exito.</p></div>";
			break;
		case 'v-true-edit-cki':
			$contenido="<div id='marco-suceso-1'><p><span class='glyphicon glyphicon-ok'></span> Su anuncio se ha actualizado con exito.</p></div>";
			break;
		case 'v-true-edit-ckii':
			$contenido="<div id='marco-suceso-1'><p><span class='glyphicon glyphicon-ok'></span> Su anuncio se ha actualizado con exito.</p></div>";
			break;
		case 'true-delete':
			$contenido="<div id='marco-suceso-1'><p><span class='glyphicon glyphicon-ok'></span> Su anuncio se ha eliminado con exito.</p></div>";
			break;
		case 'v-denuncia-true':
			$contenido="<div id='marco-suceso-1'><p><span class='glyphicon glyphicon-ok'></span> Su denuncia ha sido procesada con exito.</p></div>";
			break;
		case 'f-posting-edit':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: Debe de llenar todos los campos.</p></div>
			<p><a href='edit.php?ck=$ck'> > Regresar al formulario</a></p>";
			break;
		case 'false-den':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: Debe de llenar todos los campos.</p></div>
			<p><a href='denuncias.php?id=$id'> > Regresar al formulario</a></p>";
			break;
		case 'f-posting':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: Debe de llenar todos los campos.</p></div>
			<p><a href='publicar.php'> > Regresar al formulario</a></p>";
			break;
		case 'no-edit-num':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Este anuncio ha sido eliminado por el usuario. Si es un error pongase en contacto con nosotros</p></div>";
			break;
		case 'no-edit-cki-f':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: No se ha podido actualizar su anuncio (Error de codigo de imagen).</p></div>
			<p><a href='edit.php?ck=$ck'> > Regresar al formulario</a></p>";
			break;
		case 'f-size-edit':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: Una de las imagenes sobrepasa el tamaño maximo permitido. Recuerde el tamaño maximo para cada imagen son 2mb.</p></div>
			<p><a href='edit.php?ck=$ck'> > Regresar al formulario</a></p>";
			break;
		case 'f-size':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: Una de las imagenes sobrepasa el tamaño maximo permitido. Recuerde el tamaño maximo para cada imagen son 2mb.</p></div>
			<p><a href='publicar.php'> > Regresar al formulario</a></p>";
			break;
		case 'f-type-edit':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: Una de las imagenes no es de tipo imagen. Recuerde los formatos permitidos son .jpg .png .gif</p></div>
			<p><a href='edit.php?ck=$ck'> > Regresar al formulario</a></p>";
			break;
		case 'f-type':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: Una de las imagenes no es de tipo imagen. Recuerde los formatos permitidos son .jpg .png .gif</p></div>
			<p><a href='publicar.php'> > Regresar al formulario</a></p>";
			break;
		case 'false-delete':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: No se ha podido eliminar su anuncio. Puede que haya cambiado los parametros del codigo. Si cree que es un error puede ponerse en contacto con nosotros.</p></div>";
			break;
		case 'f-email':
			$contenido="<div id='marco-suceso-0'><p><span class='glyphicon glyphicon-remove'></span> Error: Ha ocurrido un error al procesar el anuncio (Error de envio de email). Intentelo más tarde :(</p></div>";
			break;
		default:
			header("Location: index.php");
			break;
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("estructura/head-index.php");?>
</head>
<body>
	<?php include("estructura/header-publicar.php");?>
	<div class="container">
		<div class="row row-1">
			<?php echo $contenido; ?>
		</div>

		<br><hr>
		<p style="color:#7F7A7A;font-size:1.5em">¡Recuerda! publicar es gratis y lo puedes hacer en cualquier momento  <span class="glyphicon glyphicon-thumbs-up"></span> | <a href="publicar.php" class="btn-primary btn-publicar-post">Publicar</a></p><br>
		<?php 
		include("contenido/section-ultimos-anuncios.php"); ?>
	</div>
	<?php include("estructura/footer.php"); ?>
</body>
<?}?>
</html>