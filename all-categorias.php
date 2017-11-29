<?php include("modulos/conexion.php"); ?>
<?php
if (isset($_GET['id'])){
	include('prueba.php');
}
else{
$registros='25';
$pag = $_GET['pag'];
if (!$pag){
	$inicio = 0;
	$pag = 1;
}else{
	$inicio = ($pag -1) * $registros;
}
$all = quitar($_GET['all']);
?>
<!DOCTYPE html>
<html lang="es">
<?php include("estructura/head-all-categorias.php"); ?>
<body>
	<?php include("estructura/header.php");?>
		<div class="container" id="nav-resultados">
			<?php include("contenido/form-busqueda-xs.php"); ?>
			<br class="visible-xs">
			<div class="row">
				<div>
					<?php 
					$entradas=mysql_query("SELECT * FROM anuncios");
					$total_registros=mysql_num_rows($entradas);
					if ($total_registros<1){
						echo "<p class='p-resultados-cat'><a href='index.php'>Inicio</a> | No hay resultados para <span style='font-weight:bold'>'$q'</span> puede buscar también por categorias</p><br><hr>
						";
						include("contenido/section-categorias.php");
					}else{
					?>
					<?php include("estructura/nav-resultados-all.php") ?>
				</div><hr>
			</div>
			<div class="row">
					<div id="categorias-busqueda" class="hidden-xs">
						<?php include("contenido/busqueda-por-categorias-q.php"); ?>
					</div>
			<hr class="hidden-xs">
			<div class="row">
				<section>
				<div class="col-sm-9 col-xs-12">
					<div id="container-busqueda">
						<?
						$total_paginas=ceil($total_registros/$registros);
						$publicacion=mysql_query("SELECT * FROM anuncios ORDER BY id DESC LIMIT $inicio, $registros");
						?>
						<?php include("contenido/section-resultado-busqueda-all.php") ;?>

					</div><br>
					<div id="paginacion">
						<center>
							<ul class="pagination">
								<?
								if($total_registros>$registros){
									if (($pag-1)>0){
										echo "<li><a href='all-categorias.php?pag=".($pag-1)."'>Anterior</a></li>";
									}else{
										echo "<li class='li-pag'>Anterior</li>";
									}
								}
								//Numero de paginas a mostrar
								$num_pag=5;
								//Limitamos las paginas mostradas
								$pagina_intervalo=ceil($num_pag/2)-1;

								//caculamos desde que numero de pagina se mostrara
								$pagina_desde=$pag-$pagina_intervalo;
								$pagina_hasta=$pag+$pagina_intervalo;

								//Verificar que pagina_desde sea negativo

								if ($pagina_desde<1){//Le sumamos la cantidad sobrante para mantener el numero de enlaces mostrados 
									$pagina_hasta-=($pagina_desde-1); 
									$pagina_desde=1;
								}
							    // Verificar que pagina_hasta no sea mayor que paginas_totales 
								if($pagina_hasta>$total_paginas){
									$pagina_desde-=($pagina_hasta-$total_paginas);
									$pagina_hasta=$total_paginas;
									if($pagina_desde<1){
										$pagina_desde=1;
									}
								}

								for ($i=$pagina_desde; $i<=$pagina_hasta; $i++){
									if ($pag==$i){
										echo "<li class='pagination-activo'><span>".$pag."</span></li>";
									}else{
										echo "<li><a href='all-categorias.php?pag=$i'>$i</a></li>";
									}
								}

								if(($pag+1)<=$total_paginas){
									echo "<li><a href='all-categorias.php?pag=".($pag+1)."'>Siguiente</a></li>";
								}else{
									echo "<li class='li-pag'>Siguiente</li>";
								}
								?>
							</ul>
						</center>
					</div>
				</div>
				</section>
				<div class="col-sm-3 col-xs-12">
					<aside id="patrocinadores">
						<?php include("contenido/aside-patrocinadores.php"); ?>
					</aside>
					<div class="visible-xs" style="margin-bottom:30px">
						<p style="margin-top:20%">Busqueda por categorias</p>
						<div id="categorias-busqueda">
							<?php include("contenido/busqueda-por-categorias-q.php"); ?>
						</div>
					</div>
					<h3 class="centrado margen-top visible-xs">¡Publicar tu anuncio es gratis y sin comisiones! - <a href="publicar.php" class="btn-primary btn-publicar-post">Publicar</a></h3>
				</div>
<?}}?>
			</div>
		</div><br><hr>
	<?php include("estructura/footer.php"); ?>
</body>
</html>