<!DOCTYPE html>
<html lang="es">
<?php include("estructura/head-publicar-anuncio.php"); ?>
<body>
<?php
if(!isset($_GET['cat']) || empty($_GET['cat'])){
	include('publicar.php');
}else{

?>
	<?php include("estructura/header-publicar.php");?>
		<div class="row-1 container">
			<div class="row">
				<?php include("contenido/form-publicar-anuncio.php"); ?>
			</div>
		</div>
	<br><br><hr>
	<?php include("estructura/footer.php"); ?>
	<?php include("estructura/script-publicar-anuncio.php"); ?>
<?}?>
</body>
</html>