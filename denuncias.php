<?php 
if(empty($_GET['id'])){
	header("Location: index.php");
}else{
	include("modulos/conexion.php");
	$id=intval(quitar($_GET['id']));
	$q=mysql_query("SELECT * FROM anuncios WHERE id='$id' and estado=1");
	$reg=mysql_fetch_array($q);
	$num=mysql_num_rows($q);
	if($num==1){
?>
<!DOCTYPE>
<html lang="es">
<head>
	<?php include("estructura/head-index.php");?>
</head>
<body>
	<?php include("estructura/header-publicar.php"); ?>
	<div class="container">
		<div class="row row-1 marco">
			<p>Su denuncia para la publicación:</p><br>
			<div class="row">
								<a href="anuncio.php?id=<?php echo $reg['id'] ?>" target="_blank">
								<div class="col-sm-offset-2 col-sm-3">
									<figure class="img-container-anuncio-search">
										<?
										if ($reg['imagen1']){?>
										<img src="img/anuncios/<?echo $reg['imagen1']?>" class="img-anuncio-search" >
										<?}elseif (empty($reg['imagen1'])){?>
										<img src="img/anuncios/<?echo $reg['imagen2']?>" class="img-anuncio-search" >
										<?}elseif (empty($reg['imagen2'])){?>
										<img src="img/anuncios/<?echo $reg['imagen3']?>" class="img-anuncio-search" >
										<?}else{
										echo"error de imagen";
										}?>	
									</figure>
								</div>
								<div class="col-sm-5">
									<p class="resultado-busqueda-a"><?php echo substr($reg['titulo'],0,79)."...";?></p>
									<?php 
									$distrito_id=$reg['distrito_id'];
									$q_distrito=mysql_query("SELECT * FROM distritos WHERE id_distrito='$distrito_id'");
									$reg_distrito=mysql_fetch_array($q_distrito);
									?>
									<span class="resultado-busqueda-span">Distrito - <?php echo $reg_distrito['distrito'];?></span>
									<p class="resultado-busqueda-precio text-capitalize">S/.<?php echo $reg['precio'];?></p>
									<span class="resultado-busqueda-fecha">Publicado el <?php echo $reg['fecha_publicacion'];?></span>
								</div>
								</a>
			</div><br><br>
			<form method="post" action="action/denunciar.php">
				<div class="form-group">
					<div class="col-sm-6">
						<p>Seleccione el motivo de su denuncia:</p>
						<select class="form-control" name="motivo-denuncia[]" id="select-multiple" type="single" size="9" multiple required>
							<option>-Publica a un precio menor del que cobra realmente</option>
							<option>-Vende un producto que no cumple con los terminos o condiciones del sitio</option>
							<option>-No está publicado en la categoria correcta</option>
							<option>-Creo que es un intento de fraude</option>
							<option>-Incluye palabras que no tienen nada que ver con lo que vende</option>
							<option>-Tiene contenido ofensivo, de naturaleza racista, sexual u obsceno</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<p>Dejanos tu comentario</p>
						<textarea class="form-control" name="comentario-denuncia" rows="8" style="resize:none" required></textarea>
					</div>
				</div>
				<input type="hidden" name="id_hdn" value="<?php echo $reg['id'] ?>">
				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-4">
						<input type="submit" value="Denunciar Publicación" class="btn btn-primary" id="enviar_denuncia" style="margin:30px 0">

					</div>
				</div>
			</form>
		</div>
	</div><hr>
	<?php include("estructura/footer.php"); ?>
</body>
<?}else{
	header("Location: index.php");
	}
}?>
</html>
