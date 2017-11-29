<?php include("modulos/conexion.php");
$tag_p = quitar($_GET['tag_p']);
$tag = quitar($_GET['tag']);
$id = intval(quitar($_GET['id']));
$q = quitar_q($_GET['q']);
if(empty($id)){
	header("Location: index.php");
}else{
$q_title=mysql_query("SELECT * FROM anuncios WHERE id='$id'");
$n=mysql_num_rows($q_title);
if($n==1){
?>
<!DOCTYPE html>
<html lang="es">
<?php include("estructura/head-anuncio.php"); ?>
<body>
	<?php include("estructura/header.php");?>
	<div class="container">
		<div class="row">
			<div id="nav-resultados">
				<?php 
				if(!$n==0){
				?>
				<div class="container">
					<div class="row">
						<div class="col-sm-9">
						<?php
						$q_nav=mysql_query("SELECT * FROM anuncios WHERE id='$id'");
						$reg_ch=mysql_fetch_array($q_nav);
						$id_ch=$reg_ch['categoriahija_id'];
						$q_ch=mysql_query("SELECT * FROM categoria_hija WHERE id_cathija=$id_ch");
						$reg_ch_id=mysql_fetch_array($q_ch);
						$q_cp=mysql_query("SELECT * FROM categoria_hija,categoria_padre WHERE id_cathija=$id_ch and catpadre_id=id_catpadre");
						$reg_cp_id=mysql_fetch_array($q_cp);
						?>
						<p class="p-resultados-cat"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<?php if(!empty($q)){?>	
						<a href="busqueda.php?q=<?php echo $q;?>">Volver a resultados</a>
						<?}elseif(!empty($tag)){?>
						<a href="categoria.php?tag=<?php echo $tag;?>">Volver a resultados</a>
						<?}elseif(!empty($tag_p)){?> 
						<a href="categoria-p.php?tag_p=<?php echo $tag_p;?>">Volver a resultados</a>
						<?}else{?>
						<a href="all-categorias.php">Volver a resultados</a>
						<?}?>
						 | <a class="text-lowercase"href="categoria-p.php?tag_p=<?php echo $reg_cp_id['id_catpadre'] ?>"><?php echo $reg_cp_id['nombre'] ?></a><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="categoria.php?tag=<?php echo $reg_ch_id['id_cathija']?>"> <?php echo $reg_ch_id['nombre']?></a></p>
						</div>
						<?$q_verificar=mysql_query("SELECT * FROM anuncios WHERE id=$id and estado=1");
						$verificar_num=mysql_num_rows($q_verificar);
						if($verificar_num==1){
						?>
						<div class="col-sm-3">
							<p class="p-num-post">Publicacion#<?php echo$reg_ch['id'];?> | <a href="denuncias.php?id=<?echo $reg_ch['id']?>">Denunciar</a></p>
						</div>
						<?}else{?>
						<div class="col-sm-3">
							<p class="p-num-post">Publicacion#<?php echo$reg_ch['id'];?></p>
						</div>
						<?}?>
					</div>
				</div>
				<?}?>	
			</div>
		</div><hr>
	</div>
	<?
	if($verificar_num==1){
	?>
	<section>
		<?php include("contenido/section-descripcion-anuncio.php"); ?>
	</section><br><br><hr>
	<?php include("estructura/script-mensaje-prototipo.php") ;?>
	<?php include("estructura/footer.php") ?>
	<?php
	if(isset($_GET['m'])){
		$id_id=$reg_ch['id'];
		$cons=139+pow($id_id,2);
		$id=$id_id+$cons;
		$m=quitar($_GET['m']);
		if($m!=$id){
			$m="ERROR: Ocurrio un problema al enviar el mensaje. Intenta mas tarde :(";
		}else{
			$m="Su mensaje fue enviado con exito";
		}?>
	<script>
	mensaje=document.getElementById("form-enviar").innerHTML = ['<div class="mensajes"><?php echo $m ?></div>']; 
	document.getElementById('mensaje-send').addEventListener('change',mensaje , false);
	</script>
	<?}?>
	<script>
	$(document).ready(function() {
		$('.jqzoom').jqzoom({
	            zoomType: 'standard',
	            lens:true,
	            preloadImages: false,
	            alwaysOn:false
	        });
		
	});
	</script>
	<?}else{?>
	<div class="container">
		<br>
		<div id='marco-suceso-1'>
			<p><span class='glyphicon glyphicon-time'></span> Vender en vendeloenelvalle.com es rápido. Este anuncio ya no se encuentra activo.</p>
		</div>
		<br><hr>
		<p style="color:#7F7A7A;font-size:1.5em">¡Recuerda! publicar es gratis y lo puedes hacer en cualquier momento  <span class="glyphicon glyphicon-thumbs-up"></span> | - <a href="publicar.php" class="btn-primary btn-publicar-post">Publicar anuncio</a></p><br>
		<?php 
		include("contenido/section-ultimos-anuncios.php"); ?>
	</div>
	<? include("estructura/footer.php"); 
	}?>
</body>
<?}else{header("Location: index.php");}}?>

</html>
