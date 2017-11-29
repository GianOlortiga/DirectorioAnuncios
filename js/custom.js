
function goToByScroll(id){
	$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}

var loadcontent = function(p, num_total){
	
	$("#more-items").remove();
	num = ((p - 1) * 12) + 1;
	pag = p + 1;
	num_ini = num;
	
	$.ajax({
		type: "POST",
		url : 'modulos/ajax_cargar_mas.php?p='+p,
		async: true,
		success : function (datos){
			var dataJson = eval(datos);
				
			for(var i in dataJson){
				$("#list-items").append('<div class="col-sm-3">
						<a href="anuncio.php?id=' + dataJson[i].reg_id + 'class="ultimos-a-div">' + 
						'<div class="img-anuncio-min" >
							<?
							if (' + dataJson[i].reg_imagen1 + '){?>
							<img src="img/anuncios/' + dataJson[i].reg_imagen1 + '" class="img-div-min fade" >
							<?}elseif (empty(' + dataJson[i].reg_imagen1 + ')){?>
							<img src="img/anuncios/' + dataJson[i].reg_imagen2 + '" class="img-div-min fade" >
							<?}elseif (empty(' + dataJson[i].reg_imagen2 + ')){?>
							<img src="img/anuncios/' + dataJson[i].reg_imagen3 + '" class="img-div-min fade" >
							<?}else{
							echo"error de imagen";
							}?>
						</div>
						<div class="body-anuncio-min"> 
							<div class="container-titulo">
							<p><?php echo substr(' + dataJson[i].reg_titulo + ',0,58)."...";?></p>
							</div>' + 
							'<p class="p-precio-min">S/.' + dataJson[i].reg_precio + '</p> 
						</div>
					</a></div></div>');
				num++;
			}
			if(num<num_total){
				$("#list-items").append('<div id="more-items">' +
					'<p class="centrado cargar-mas"><a href="#" onclick="loadcontent('+ pag +','+ num_total +')">Cargar más anuncios</a></p>' +
           			'</div>');
					
			}
			goToByScroll("item-"+num_ini);
		}
	});
	return false;	
};