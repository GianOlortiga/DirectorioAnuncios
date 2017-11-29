<?php 
while ($reg=mysql_fetch_array($publicacion)) {
?>
<div class="resultado-busqueda">
							<?php if(isset($q)){?>
							<a href="anuncio.php?id=<?php echo $reg['id'];?>&q=<?php echo $q; ?>">
							<?}elseif(!isset($tag_p)){?>
							<a href="anuncio.php?id=<?php echo $reg['id'];?>&tag=<?php echo $reg_tag['id_cathija']; ?>">
							<?}else{?>
							<a href="anuncio.php?id=<?php echo $reg['id'];?>&tag_p=<?php echo $reg_tag['id_catpadre']; ?>">
							<?}?>	
							<div class="row">
								<div class="col-sm-3">
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
								</div>
								<div class="col-sm-2">
									<p class="resultado-busqueda-precio text-capitalize">S/.<?php echo $reg['precio'];?></p>
								</div>
								<div class="col-sm-2">
									<span class="resultado-busqueda-fecha"><?php echo $reg['fecha_publicacion'];?></span>
								</div>
							</div>
							</a>
						</div>
<?}?>