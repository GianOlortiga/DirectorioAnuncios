<!DOCTYPE html>
<html lang="es">
<?php include("estructura/head-publicar-anuncio.php"); ?>
<body>
	<?php include("estructura/header-publicar.php");?>
	<section>
		<div class="container selec-cat">
			<div id="selec-cat" class="row-1">
				<p>Seleccione la categoria en la que desea vender:</p><br>
				<div style="border-top: 0">
				<?php include("modulos/listpost-categorias.php"); ?>
				</div>
			</div>	
		</div>
	</section><br><br><hr>
	<?php include("estructura/footer.php"); ?>
</body>
</html>