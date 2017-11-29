					<?php
					$sql =mysql_query("SELECT * FROM categoria_padre");
					$n=mysql_num_rows($sql);
					for ($i=1; $i <= $n; $i++) { 	
					?>
					<div class="col-sm-6 col-lg-6">
					<?
				   	$sql_p1 = mysql_query("SELECT * FROM categoria_padre WHERE id_catpadre=$i");
				   	$rowp=mysql_fetch_array($sql_p1);
				   	$id_catpadre = $rowp['id_catpadre'];
				   	$sql_h1 = mysql_query("SELECT * FROM categoria_hija WHERE catpadre_id=$id_catpadre");
				   	$sql_sum1 = mysql_query("SELECT * FROM anuncios,categoria_hija WHERE categoriahija_id=id_cathija and catpadre_id=$id_catpadre");
				   	echo '<p class="text-uppercase categoria-p">'.$rowp['nombre'];
				   	?>
				   		<img src="img/<?echo$i?>.png" width="40px"></p>
						<ul class="list-categorias">
							<?
				   			while ($row=mysql_fetch_array($sql_h1)){
				   				$id_cathija=$row['id_cathija'];
				   				$num=mysql_query("SELECT * FROM anuncios WHERE categoriahija_id=$id_cathija");
				   				echo '<li><a href="categoria.php?tag='.$row['id_cathija'].'">'.utf8_encode($row['nombre']).'<span class="total-cat">('.mysql_num_rows($num).')</span></a></li>';
				   			}
				   			?>
						</ul>
					</div>
					<?}?>