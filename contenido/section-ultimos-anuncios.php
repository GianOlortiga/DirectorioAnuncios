<?php 
$qr=mysql_query("SELECT * FROM anuncios");
$total_items=mysql_num_rows($qr);
$q=mysql_query("SELECT * FROM anuncios ORDER BY id DESC LIMIT 0,12");
?>
		<div class="container hidden-xs">
			<div class="row">
				<p class="p-ultimos">Ultimos Anuncios</p>
				<?
				while ($reg=mysql_fetch_array($q)) {
				?>
				<div class="col-sm-3">
				<div class="resultados-ultimos">
				<a href="anuncio.php?id=<?echo $reg['id']?>" class="ultimos-a-div">
					<div class="img-anuncio-min" >
						<?
						if ($reg['imagen1']){?>
						<img src="img/anuncios/<?echo $reg['imagen1']?>" class="img-div-min" >
						<?}elseif (empty($reg['imagen1'])){?>
						<img src="img/anuncios/<?echo $reg['imagen2']?>" class="img-div-min" >
						<?}elseif (empty($reg['imagen2'])){?>
						<img src="img/anuncios/<?echo $reg['imagen3']?>" class="img-div-min" >
						<?}else{
						echo"error de imagen";
						}?>	
					</div>
					<div class="body-anuncio-min">
						<div class="container-titulo">
						<p><?php echo substr($reg['titulo'],0,58)."...";?></p>
						</div>
						<p class="p-precio-min text-capitalize">S/.<?php echo $reg['precio'];?></p>
					</div>
				</a>
				</div>
				</div>
				<?}?>
			</div>
			<div class="row">
				<p class="centrado cargar-mas"><a href="all-categorias.php" target="_blank">Ir a más anuncio</a></p>
			</div><hr>
		</div>