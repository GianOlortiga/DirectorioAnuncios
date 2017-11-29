
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
	<div class="marco" style="margin-top:-10px">
		<br><br>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="seleccion-category">*Seleccionar Subcategoria</label>
			<div class="col-sm-5">
				<?
				include("modulos/conexion.php");
				include("modulos/select-subcategoria.php");?>
			</div>
			<?include("modulos/marca-categoria.php");?>	
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="titulo-anuncio">*Titulo del Anuncio</label>
			<div class="col-sm-5">
				<input type="text" class="form-control form-control-anuncio" name="titulo_anuncio_txt" id="titulo-anuncio" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="descripcion-anuncio">*Descripcion del anuncio</label>
			<div class="col-sm-5">
				<textarea class="form-control form-control-anuncio" name="descripcion_anuncio_txtarea" id="descripcion-anuncio" rows="9" style="resize:vertical" required></textarea>
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
					<div class="input-img" class="fade-1">
						<input class="files" type="file" id="img_anuncio" onchange="valida(this)" name="img_anuncio_fls" accept="image/*" />
						<div id="list"></div>
					</div>			
				</div>
				<div class="col-sm-2 col-xs-12">
					<div class="input-img" class="fade-1">
						<input class="files" type="file" id="img_anuncio2" onchange="valida(this)" name="img_anuncio2_fls" accept="image/*" />
						<div id="list2"></div>
					</div>			
				</div>
				<div class="col-sm-2 col-xs-12">
					<div class="input-img" class="fade-1">
						<input class="files" type="file" id="img_anuncio3" onchange="valida(this)" name="img_anuncio3_fls" accept="image/*" />
						<div id="list3"></div>
					</div>			
				</div>	
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3">
				<small class="help-block">Los formatos aceptados para las imagenes son .jpg, .gif y .png. El tamaño máximo permitido para cada imagen es 2 MB (Imagenes medianas - pequeñas).</small>
			</div>
		</div>
		<br class="visible-xs">
		<div class="form-group">
			<label class="col-sm-3 col-xs-5 control-label" for="precio-articulo">*Precio Articulo S/.</label>
			<div class="col-sm-5 col-xs-6">
				<input type="number" class="form-control form-control-anuncio" name="precio_articulo_txt" id="precio-articulo" required>
			</div>
		</div>
	</div><br>
	<div class="marco">
		<h2>Información de Contacto:</h2><hr><br>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="nombre-anunciante">*Nombre del anunciante</label>
			<div class="col-sm-5">
				<input type="text" class="form-control form-control-anuncio" name="nombre_anunciante_txt" id="nombre-anunciante" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="email-anunciante">*E-mail</label>
			<div class="col-sm-5">
				<input type="email" class="form-control form-control-anuncio" name="email_anunciante_txt" id="email-anunciante" required>
			</div>
			<p class="help-block col-sm-4"><span class="glyphicon glyphicon-lock"></span> Tu e-mail no será publicado</p>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="telefono-anunciante">*Telefono de contacto</label>
			<div class="col-sm-5">
				<input type="number" class="form-control form-control-anuncio" name="telefono_anunciante_txt" id="telefono-anunciante" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="localidad-anunciante">*Localidad</label>
			<div class="col-sm-5">
				<?php include("modulos/select-distritos.php"); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-5 col-sm-offset-3">
				<input type="submit" class="form-control form-control-anuncio btn btn-primary" name="enviar_anuncio_btn" id="enviar-anuncio" value="PUBLICAR ANUNCIO">
				<small><p class="help-block">Al publicar un anuncio, estás de acuerdo y aceptas los <a href="terminos-y-condiciones.php">Términos y condiciones</a>  de vendeloenelvalle.com</p></small>
			</div>
		</div><BR><BR>
	</div>
</form>