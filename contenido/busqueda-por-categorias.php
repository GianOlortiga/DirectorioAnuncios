					<p id="categorias-busqueda-p"><a href="all-categorias.php">IR A TODAS LAS CATEGORIAS</a></p>
					<?php
					$q_obt_tagp=mysql_query("SELECT * FROM categoria_hija WHERE id_cathija=$tag");
					$reg_obt_tagp=mysql_fetch_array($q_obt_tagp);
					$tag_p_obt=$reg_obt_tagp['catpadre_id'];
					$q_allcategory_h=mysql_query("SELECT * FROM categoria_hija WHERE catpadre_id=$tag_p_obt");
					while($reg_allcategory=mysql_fetch_array($q_allcategory_h)){;
						$id_cathija=$reg_allcategory['id_cathija'];
						$sql_sum1 = mysql_query("SELECT * FROM anuncios WHERE categoriahija_id=$id_cathija");
						$suma=mysql_num_rows($sql_sum1);
					?>	
						<a href="categoria.php?tag=<?php echo $id_cathija ?>"><p><?php echo $reg_allcategory['nombre'] ?> <span class="total-cat"><?php echo "($suma)"; ?></span></p></a>
					<?}?>