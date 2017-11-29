					<?
					$sql2=mysql_query("SELECT * FROM categoria_padre WHERE id_catpadre=$cat");
					while($reg2=mysql_fetch_array($sql2)){
					?>
						<p class="help-block col-sm-4">Categoria: <?echo $reg2['nombre']?></p>
					<?
					}
					?>