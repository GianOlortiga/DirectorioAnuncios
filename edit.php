<?php

if(!isset($_GET['ck']) || empty($_GET['ck'])){
	include('index.php');
}else{
include("modulos/conexion.php");
$ck=intval(quitar($_GET['ck']));
$controlador=mysql_query("SELECT * FROM anuncios WHERE codigo=$ck");
$resp=mysql_num_rows($controlador);
if($resp==1){
?>
<!DOCTYPE html>
<html lang="es">
<?php include("estructura/head-publicar-anuncio.php"); ?>
<body>

	<?php include("estructura/header-publicar.php");?>
		<div class="row-1 container">
			<div class="row">
				<?php 
				$reg_edit=mysql_fetch_array($controlador);
				include("contenido/form-editar-anuncio.php"); ?>
			</div>
		</div>
	<br><br><hr>
	<?php include("estructura/footer.php"); ?>
	<?php include("estructura/script-editar-anuncio.php") ?>

</body>
</html>
<?}else{
	header("Location: index.php");
}
}?>