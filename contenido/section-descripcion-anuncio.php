<div class="container">
			<div class="row">
			<?php 
			$registros=mysql_query("SELECT * FROM anuncios WHERE id='$id'");
			$numero=mysql_num_rows($q_title);
			if($numero==0){
			?>
				<div class="col-sm-8">
					<?echo "<div id='no-encontrado'><center>No se ha encontrado el anuncio :(</center></div>
					"?>
					
				</div>
				<div class="col-sm-4">
					<div id='ads-patrocinio'>
					<?php include('adserving.php'); ?>
					</div>
				</div>
			<?}else{
			$reg=mysql_fetch_array($registros)
			?>

				<div class="col-sm-8">
					<section id="contenido-anuncio">
						<h1 class="h1-anuncio"><?echo $reg['titulo']?></h1>
						<?php 
						$distrito_id=$reg['distrito_id'];
						$distrito=mysql_query("SELECT * FROM distritos WHERE id_distrito = $distrito_id");
						$reg_distrito=mysql_fetch_array($distrito);
						?>
						<p class="p-fecha-lugar"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Publicado <?echo $reg['fecha_publicacion']?>	| <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $reg_distrito['distrito'];?>, La Libertad</p>
						<div class="row">
							<div class="col-sm-10">
								<div class="img-anuncio">
									<?
										if ($reg['imagen1']){?>
										<img src="img/anuncios/<? echo $reg['imagen1']?>" class="img-anuncio-div visible-xs">
										<?}elseif (empty($reg['imagen1'])){?>
										<img src="img/anuncios/<? echo $reg['imagen2']?>" class="img-anuncio-div visible-xs">
										<?}elseif (empty($reg['imagen2'])){?>
										<img src="img/anuncios/<? echo $reg['imagen3']?>" class="img-anuncio-div visible-xs">
										<?}else{
											echo"error de imagen";
									}?>
									<div class="clearfix hidden-xs">
									    <?
										if ($reg['imagen1']){?>
										<a href="img/anuncios/<? echo $reg['imagen1']?>" class="jqzoom" rel='gal1'  title="Imagen" >
								            <img src="img/anuncios/<? echo $reg['imagen1']?>"  title="Imagen" class="img-anuncio-div">
								        </a>
								        <?}elseif (empty($reg['imagen1'])){?>
								        <a href="img/anuncios/<? echo $reg['imagen2']?>" class="jqzoom" rel='gal1'  title="Imagen" >
								            <img src="img/anuncios/<? echo $reg['imagen2']?>"  title="Imagen" class="img-anuncio-div">
								        </a>
								        <?}elseif (empty($reg['imagen2'])){?>
								        <a href="img/anuncios/<? echo $reg['imagen3']?>" class="jqzoom" rel='gal1'  title="Imagen" >
								            <img src="img/anuncios/<? echo $reg['imagen3']?>"  title="Imagen" class="img-anuncio-div">
								        </a>
								        <?}else{
								        	echo"error de imagen";
								        }?>
									</div>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="clearfix hidden-xs" >
										<br>
										<ul id="thumblist" class="clearfix">
											<?
											if (empty($reg['imagen1'])){
												echo "<li></li>";
											}else{
											?>
											<li><a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './img/anuncios/<? echo $reg['imagen1']?>',largeimage: './img/anuncios/<? echo $reg['imagen1']?>'}"><img src='img/anuncios/<? echo $reg['imagen1']?>' class="img-responsive img-slider-min"></a></li><?}?>
											<?
											if (empty($reg['imagen2'])){
												echo "<li></li>";
											}else{
											?>
											<li><a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './img/anuncios/<? echo $reg['imagen2']?>',largeimage: './img/anuncios/<? echo $reg['imagen2']?>'}"><img src='img/anuncios/<? echo $reg['imagen2']?>' class="img-responsive img-slider-min"></a></li><?}?>
											<?
											if (empty($reg['imagen3'])){
												echo "<li></li>";
											}else{
											?>
											<li><a  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './img/anuncios/<? echo $reg['imagen3']?>',largeimage: './img/anuncios/<? echo $reg['imagen3']?>'}"><img src='img/anuncios/<? echo $reg['imagen3']?>' class="img-responsive img-slider-min"></a></li><?}?>
											
										</ul>
									</div>
							</div>
						</div>
						<br>
						<p class="p-detalles-a">Detalles del Anuncio</p>
						<p class="text-justify"><?php echo $reg['descripcion'];?></p>
						<div class="visible-xs">
							<br>
							<p class="datos-anunciante-title">DATOS DEL ANUNCIANTE</p><hr class="hr-salto">
							<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php echo $reg['nombre_anunciante'];?></p>
							<p class="datos-anunciante-items"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <?php echo $reg['telefono'];?> <a href="tel:<?php echo $reg['telefono'] ?>" class="btn-llamar">LLAMAR</a></p>
							
							<p class="datos-anunciante-items"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $reg_distrito['distrito'];?></p>
							<br>
							<p class="datos-anunciante-title">PRECIO</p><hr class="hr-salto">
							<p class="datos-anunciante-items">S/.<?php echo $reg['precio'];?></p>
						</div>
						<br><hr>
						<div id="compartir">
							<?php include("compartir-anuncio.php"); ?>
						</div>
					</section><br>
					<div id="post-relacionados" class="hidden-xs">
						<?php
						$rel=$reg['categoriahija_id'];						
						$q_rel=mysql_query("SELECT * FROM anuncios WHERE categoriahija_id='$rel' ORDER BY titulo ASC  LIMIT 3");
						$q_rel_tag=mysql_query("SELECT * FROM categoria_hija WHERE id_cathija='$rel'");
						$reg_q_tag=mysql_fetch_array($q_rel_tag);
						$reg_q_tagp=$reg_q_tag['catpadre_id'];
						?>
						<p id="post-relacionados-p">Anuncios relacionados</p>
						<div class="row">
							<?php while($q_anuncios_reg=mysql_fetch_array($q_rel)){ ?>
							<div class="col-sm-4">
								<div class="resultados-ultimos">
									<?php if($tag){?>
									<a href="anuncio.php?id=<?php echo $q_anuncios_reg['id'];?>&tag=<?php echo $reg_q_tag['id_cathija']; ?>" class="ultimos-a-div">
									<?}elseif($q){?>
									<a href="anuncio.php?id=<?php echo $q_anuncios_reg['id'];?>&q=<?php echo $q; ?>" class="ultimos-a-div">
									<?}elseif($tag_p){?>
									<a href="anuncio.php?id=<?php echo $q_anuncios_reg['id'];?>&tag_p=<?php echo $reg_q_tagp; ?>" class="ultimos-a-div">
									<?}else{?>
									<a href="anuncio.php?id=<?php echo $q_anuncios_reg['id'];?>&tag_all=<?php echo "all"; ?>" class="ultimos-a-div">
									<?}?>
									<div class="img-anuncio-min" >
										<?
										if ($q_anuncios_reg['imagen1']){?>
										<img src="img/anuncios/<?echo $q_anuncios_reg['imagen1']?>" class="img-div-min" >
										<?}elseif (empty($q_anuncios_reg['imagen1'])){?>
										<img src="img/anuncios/<?echo $q_anuncios_reg['imagen2']?>" class="img-div-min" >
										<?}elseif (empty($q_anuncios_reg['imagen2'])){?>
										<img src="img/anuncios/<?echo $q_anuncios_reg['imagen3']?>" class="img-div-min" >
										<?}else{
										echo"error de imagen";
										}?>
									</div>
									<div class="body-anuncio-min">
										<div class="container-titulo">
										<p><?php echo substr($q_anuncios_reg['titulo'],0,58)."...";?></p>
										</div>
										<p class="p-precio-min">S/<?php echo $q_anuncios_reg['precio']; ?></p>
									</div>
									</a>
								</div>
							</div>
							<?}?>
						</div>
					</div><br>
					<div id="ads-patrocinio">
						<?php include("adserving.php"); ?>
					</div>
				</div>
				<div class="col-sm-4">
					<aside>
					<div id="datos-anunciante" class="hidden-xs">
						<p class="datos-anunciante-title">DATOS DEL ANUNCIANTE</p><hr class="hr-salto">
						<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php echo $reg['nombre_anunciante'];?></p>
						<p class="datos-anunciante-items"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <?php echo $reg['telefono'];?></p>
						
						<p class="datos-anunciante-items"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $reg_distrito['distrito'];?></p>
						<p class="datos-anunciante-items"></p>
					</div>
					<div id="precio-anuncio" class="hidden-xs">
						<p class="precio-anuncio-title">PRECIO:</p>
						<p class="precio-anuncio-precio">S/.<?php echo $reg['precio'];?></p>
					</div>
					<div id="enviar-mensaje" class="hidden-xs">
						<?php
						$id_anuncio=$reg['id'];
						$email_anunciante=$reg['email'];
						?>
						<p>ENVIAR MENSAJE</p><hr style="margin:0 -10px 15px -15px">
						<div id="mensaje-send"></div>
						<form id="form-enviar" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" class="form-control" name="name_contactante" id="name_contactante_txt" placeholder="Nombre" required>
							</div>
							<div class="form-group">
								<textarea class="form-control resize-none" name="msj_contactante" id="msj_contactante_txa" rows="4" placeholder="Mensaje" required></textarea>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email_contactante" id="email_contactante_e" placeholder="E-mail" required>
							</div>
							<div class="form-group">
								<input type="number" class="form-control" name="fono_contactante" id="fono_contactante_f" placeholder="Tu N° de Telefono (opcional)">
							</div>
							<input type="hidden" name="email_anunciante_hdn" value="<?php echo $email_anunciante;?>">
							<input type="hidden" name="id_anuncio_hdn" value="<?php echo $id_anuncio;?>">
							<div class="form-group">
								<input type="submit" class="form-control btn btn-enviar-msj" id="enviar_mensaje" value="Enviar mensaje">
							</div>
							
						</form>
					</div>
					<br class="visible-xs">	
					<div id="consejos">
						<p id="consejos-title">Consejos de seguridad para compradores</p>
						<ul>
						<li>Procura reunirte en un lugar seguro y público..</li>
						<li>Revisa el artículo antes de comprarlo..</li>
						<li>Paga solo después de recibir el artículo..</li>
						</ul>
						<p id="consejos-atribution">Consejos brindado por <a href="http://olx.com.pe" target="_blank">OLX</a> Perú</p>
					</div>
					<div id="nota-anuncio">
						<p>Vendeloenelvalle.com no vende este artículo y no participa en ninguna negociación, venta o perfeccionamiento de operaciones.</p>
					</div><hr>
					<div id="publicidad">
						<?php include("publicidad-banner.php"); ?>
					</div>
					</aside>
				</div>
			</div>
			<?}?>
		</div>