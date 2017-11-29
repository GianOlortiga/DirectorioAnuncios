					<p id="categorias-busqueda-p">Categorias</p>
					<?php
					$q_allcategory=mysql_query("SELECT * FROM categoria_padre");
					while($reg_allcategory=mysql_fetch_array($q_allcategory)){;
						$id_catpadre=$reg_allcategory['id_catpadre'];
						$sql_sum1 = mysql_query("SELECT * FROM anuncios,categoria_hija WHERE categoriahija_id=id_cathija and catpadre_id=$id_catpadre");
						$suma=mysql_num_rows($sql_sum1);
					?>				
						<a href="categoria-p.php?tag_p=<?php echo $id_catpadre ?>"><p><?php echo $reg_allcategory['nombre'] ?> <span class="total-cat"><?php echo "($suma)"; ?></span></p></a>

					<?}?>