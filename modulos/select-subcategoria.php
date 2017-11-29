						<?
						$cat= intval(quitar($_GET['cat']));
					    $sql=mysql_query("SELECT * FROM categoria_hija WHERE catpadre_id LIKE $cat ORDER BY nombre");
					    ?>
					    <select class="form-control form-control-anuncio" name="categoriahija" id="categoriahija" required>
					    	<option value="">- Seleccione una subcategoria -</option>
					    <?
					    while($reg=mysql_fetch_array($sql)){
					    ?>
					    	<option class="text-capitalize" value="<?echo $reg['id_cathija']?>"><?echo $reg['nombre'];?></option>
					    <?	
					    }
					    ?>
					    </select>