			

<div class="row">
	<?
	include("conexion.php");
	$sql=mysql_query("SELECT * FROM categoria_padre");
	$n=mysql_num_rows($sql);
	for ($i=1; $i<$n;$i++) {
	while($reg=mysql_fetch_array($sql)){
	?>
	<div class="col-sm-3">
		<div class="categoria-publicar resultado-busqueda fade-1" style="margin-bottom:25px">
			<a href="publicar-anuncio.php?cat=<?echo $reg['id_catpadre'];?>" class="ultimos-a-div">
				<div class="img-anuncio-min" >
						<img src="img/<?echo $i++;?>.png" class="img-div-min">
				</div>
				<br>
				<div class="body-anuncio-min">
					<div class="container-titulo">
						<p style="font-size:1em;"><?echo $reg['nombre'];?></p>
					</div>
				</div>
			</a>
		</div>
	</div>
	<?
					}
				}
				?>

</div>