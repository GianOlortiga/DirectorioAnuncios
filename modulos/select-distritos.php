						<?
					    $sql=mysql_query("SELECT * FROM distritos");
					    ?>
					    <select class="form-control form-control-anuncio" name="localidad_anunciante_slc" id="localidad-anunciante" required>
					    	<option value="">- Seleccione un distrito -</option>
					    <?
					    while($reg=mysql_fetch_array($sql)){
					    ?>
					    	<option class="text-uppercase" value="<?echo $reg['id_distrito']?>"><?echo $reg['distrito'];?></option>
					    <?	
					    }
					    ?>
					    </select>