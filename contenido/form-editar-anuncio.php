<button type="button" class="form-control btn-eliminar" data-toggle="modal" data-target=".bs-example-modal-sm">x  ELIMINAR ANUNCIO</button>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel" style="color:brown">¡Advertencia!</h4>
      	</div>
      	<div class="modal-body">
        <form method="post" action="action/eliminar-anuncio.php" enctype="multipart/form-data">
		<input type="hidden" name="codigo_hdn" value="<?php echo $reg_edit['codigo']?>">
		<input type="hidden" name="delete_hdn" value="<?php echo $reg_edit['codigo']-2368; ?>">
		 <div class="form-group">
		 		<p class="modal-p-adv">¡Felicitaciones! si está aquí es porque ya vendio su articulo. Al dar click en "ELIMINAR ANUNCIO" su anuncio será borrado del sitio web. ¿Desea realmente eliminar su anuncio?</p><br><br>
				<input type="submit" class="form-control btn-eliminar" value="x  ELIMINAR ANUNCIO">
		</div>
		</form>
      	</div>
 	</div>
  </div>
</div><br>
<form class="form-horizontal" method="post" action="action/actualizar-anuncio.php" enctype="multipart/form-data">
	<div class="marco" style="margin-top:-10px">
		<br><br>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="seleccion-category">*Seleccionar Subcategoria</label>
			<div class="col-sm-5">
				<?$categoriahija_id=$reg_edit['categoriahija_id'];
				  $sql=mysql_query("SELECT * FROM categoria_hija WHERE id_cathija=$categoriahija_id");
				  $reg_edit_q=mysql_fetch_array($sql);
				  $id_cathija=$reg_edit_q['id_cathija'];
				  $nombre_cathija=$reg_edit_q['nombre'];
				  $catpadre_id=$reg_edit_q['catpadre_id'];
				  $sql_cathija=mysql_query("SELECT * FROM categoria_hija WHERE catpadre_id=$catpadre_id");
				  ?>
				  <select class="form-control form-control-anuncio" name="categoriahija" id="categoriahija" required>
				   	
				   	<option value="">- Seleccionar una categoria -</option>
				    <?
				    while($reg_edit_slc=mysql_fetch_array($sql_cathija)){
				    	if($id_cathija!=$reg_edit_slc['id_cathija']){
				    	?>
				    		<option value="<?echo $reg_edit_slc['id_cathija']?>"><?echo $reg_edit_slc['nombre'];?></option>
				    		<?continue;
				    	}else{
				    ?>
				   		<option value="<?echo $reg_edit_q['id_cathija']?>" selected><?echo $reg_edit_q['nombre'];?></option>
				    <?}}?>
				 </select>
			</div>
			<?
			$sql2=mysql_query("SELECT * FROM categoria_padre WHERE id_catpadre=$catpadre_id");
			while($reg2=mysql_fetch_array($sql2)){
			?>
			<p class="help-block col-sm-4">Categoria: <?echo $reg2['nombre']?></p>
			<?
			}
			?>	
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="titulo-anuncio">*Titulo del Anuncio</label>
			<div class="col-sm-5">
				<input type="text" class="form-control form-control-anuncio" name="titulo_anuncio_txt" id="titulo-anuncio" value="<?php echo $reg_edit['titulo']; ?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="descripcion-anuncio">*Descripcion del anuncio</label>
			<div class="col-sm-5">
				<textarea class="form-control form-control-anuncio" name="descripcion_anuncio_txtarea" id="descripcion-anuncio" rows="9" style="resize:vertical" required><?php echo $reg_edit['descripcion']; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-xs-12">
				<label class="control-label" style="color:grey">
				Agrega fotos. Anuncios con fotos se venden más rápido
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Imagenes</label>
				<div class="col-sm-2 col-xs-12">
					<?php 
					if(!empty($reg_edit['imagen1'])&&$reg_edit['imagen1']!="generica.jpg"){
					?>
					<div id="list-preview" class="fade-1 list-preview">
						<input type="hidden" name="img_file_hdn" value="<?php echo $reg_edit['codigo']-12345; ?>">
							<div id="limpiar-edit">
								<img id="img1-edit" class="thumb" src="img/anuncios/<?php echo $reg_edit['imagen1'] ?>" title="<?php echo $reg_edit['imagen1'] ?>"></img>
								<div class="files-2-edit">
									<input type="button" class="files-a button-img" onClick="limpiar_edit();">
								</div>
							</div>		
					</div>
					<div id="input-img" class="fade-1">
						<input class="files" type="file" id="img_anuncio" name="img_anuncio_fls" accept="image/*" />
						<div id="list"></div>
					</div>
					<?}else{?>
					<div id="input-img" class="fade-1">
						<input class="files" type="file" id="img_anuncio" name="img_anuncio_fls" accept="image/*" />
						<div id="list">
							<input type="hidden" name="img_file_hdn" value="<?php echo $reg_edit['codigo']-12345; ?>">
						</div>
					</div>
					<?}?>
				</div>
				<div class="col-sm-2">
					<div class="row">
						<div class="col-sm-12 col-xs-6" >
							<?php 
							if(!empty($reg_edit['imagen2'])){
							?>
							<div id="list2-preview" class="list-preview-min">
								<input type="hidden" name="img2_file_hdn" value="<?php echo $reg_edit['codigo']-23451; ?>">
								<div id="limpiar2-edit">
									<img id="img2-edit" class="thumb-min fade-1" src="img/anuncios/<?php echo $reg_edit['imagen2'] ?>" title="<?php echo $reg_edit['imagen2'] ?>"/>
								</div>
								<div class="files-2-min-edit">
									<input type="button" class="files-a button-img" onClick="limpiar2_edit();">
								</div>
							</div>
							<div id="input-img-min1" class="input-img-min fade-1">
								<input class="files-min" type="file" id="img_anuncio2" name="img_anuncio2_fls" accept="image/*"/>	
								<div id="list2"></div>
	      					</div>
	      					<?}else{?>
	      					<div id="input-img-min1" class="input-img-min fade-1">
								<input class="files-min" type="file" id="img_anuncio2" name="img_anuncio2_fls" accept="image/*"/>	
								<div id="list2">
									<input type="hidden" name="img2_file_hdn" value="<?php echo $reg_edit['codigo']-23451; ?>">
								</div>
	      					</div>
	      					<?}?>
						</div>
						<div class="col-sm-12 col-xs-6">
							<?php 
							if(!empty($reg_edit['imagen3'])){
							?>
							<div id="list3-preview" class="list-preview-min">
								<input type="hidden" name="img3_file_hdn" value="<?php echo $reg_edit['codigo']-34512; ?>">
								<div id="limpiar3-edit">
									<img id="img3-edit" class="thumb-min fade-1" src="img/anuncios/<?php echo $reg_edit['imagen3'] ?>" title="<?php echo $reg_edit['imagen3'] ?>"/>
								</div>
								<div class="files-2-min-edit">
									<input type="button" class="files-a button-img" onClick="limpiar3_edit();">
								</div>
							</div>
							<div id="input-img-min2" class="input-img-min fade-1">
								<input class="files-min" type="file" id="img_anuncio3" name="img_anuncio3_fls" accept="image/*"/>
								<div id="list3"></div>
		      				</div>
		      				<?}else{?>
		      				<div id="input-img-min2" class="input-img-min fade-1">
								<input class="files-min" type="file" id="img_anuncio3" name="img_anuncio3_fls" accept="image/*"/>
								<div id="list3">
									<input type="hidden" name="img3_file_hdn" value="<?php echo $reg_edit['codigo']-34512; ?>">
								</div>
		      				</div>
		      				<?}?>
						</div>
					</div>
				</div>		
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3">
				<small class="help-block">Los formatos aceptados para las imagenes son .jpg, .gif y .png. El tamaño máximo permitido para cada imagen es 3 MB.</small>
			</div>
		</div>
		<br class="visible-xs">
		<div class="form-group">
			<label class="col-sm-3 col-xs-5 control-label" for="precio-articulo">*Precio Articulo S/.</label>
			<div class="col-sm-5 col-xs-6">
				<input type="text" class="form-control form-control-anuncio" name="precio_articulo_txt" id="precio-articulo" value="<?php echo $reg_edit['precio']; ?>" required>
			</div>
		</div>
	</div><br>
	<div class="marco">
		<h2>Información de Contacto:</h2><hr><br>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="nombre-anunciante">*Nombre del anunciante</label>
			<div class="col-sm-5">
				<input type="text" class="form-control form-control-anuncio" name="nombre_anunciante_txt" id="nombre-anunciante" value="<?php echo $reg_edit['nombre_anunciante']; ?>"required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="email-anunciante">E-mail</label>
			<div class="col-sm-5">
				<input type="email" class="form-control form-control-anuncio" name="email_anunciante_txt" id="email-anunciante" value="<?php echo $reg_edit['email']; ?>">
			</div>
			<p class="help-block col-sm-4"><span class="glyphicon glyphicon-lock"></span> Tu e-mail no será publicado</p>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="telefono-anunciante">*Telefono de contacto</label>
			<div class="col-sm-5">
				<input type="number" class="form-control form-control-anuncio" name="telefono_anunciante_txt" id="telefono-anunciante" value="<?php echo $reg_edit['telefono']; ?>"required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="localidad-anunciante">*Localidad</label>
			<div class="col-sm-5">
				<?
				$distrito_id=$reg_edit['distrito_id'];
				$sql_distrito=mysql_query("SELECT * FROM distritos WHERE id_distrito=$distrito_id");
				$reg_distrito=mysql_fetch_array($sql_distrito);
				$id_distrito=$reg_distrito['id_distrito'];
				$distrito=$reg_distrito['distrito'];
				$sql_distrito_array=mysql_query("SELECT * FROM distritos");
				?>
				<select class="form-control form-control-anuncio" name="localidad_anunciante_slc" id="localidad-anunciante" required>
				<option value="">- Seleccione un distrito -</option>
				<?
				while($reg_distrito_array=mysql_fetch_array($sql_distrito_array)){
					if($id_distrito!=$reg_distrito_array['id_distrito']){
				?>
				<option value="<?echo $reg_distrito_array['id_distrito']?>"><?echo $reg_distrito_array['distrito'];?></option>
					<?continue;
				}else{?>
				<option value="<?echo $id_distrito?>" selected><?echo $distrito;?></option>
				<?}}?>
				</select>
			</div>
		</div>
		<input type="hidden" name="codigo" value="<?php echo $reg_edit['codigo']?>">
		<div class="form-group">
			<div class="col-sm-5 col-sm-offset-3">
				<input type="submit" class="form-control form-control-anuncio btn btn-primary" value="ACTUALIZAR ANUNCIO">
				<small><p class="help-block">Al publicar un anuncio, estás de acuerdo y aceptas los <a href="terminos-y-condiciones.php">Términos y condiciones</a>  de vendeloenelvalle.com</p></small>
			</div>
		</div><br><br>
	</div>
</form>